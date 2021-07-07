<?php

class Let {
	

	private $conn;
	private $result;


	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function getResult(){
		return $this->result;
	}

	public function setResult($res){
			$this->result = $res;
	}

	public function sviLetovi() {

		$curl_zahtev = curl_init("http://localhost/rezervacije/api/letovi.json");

		curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
		curl_close($curl_zahtev);

		$q=mysqli_query($this->conn,"SELECT * FROM let as l join klasa as k on(l.klasa=k.idKlase)");
		$this->setResult($q);
	}

	public function sveKlase() {

		$curl_zahtev = curl_init("http://localhost/rezervacije/api/klase.json");

		curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
		$curl_odgovor = curl_exec($curl_zahtev);
		$json_objekat=json_decode($curl_odgovor, true);
		curl_close($curl_zahtev);
		$q=mysqli_query($this->conn,"SELECT * FROM klasa");
		$this->setResult($q);
	}


	public function allReservationBySearch($id) {
		$id = mysqli_real_escape_string($this->conn,$id);

		$q = mysqli_query($this->conn, "SELECT * FROM rezervacija as r join let as l on (r.let=l.id ) join klasa as k on (l.klasa=k.idKlase) join korisnik as u on (u.idKorisnik=r.korisnik) where r.let = $id");
		$this->setResult($q);
	}
      

	public function rezervacija($letId,$datum,$brSedista) {

			$letId = mysqli_real_escape_string($this->conn,$letId);
			
			$datum = mysqli_real_escape_string($this->conn,$datum);
			$brSedista = mysqli_real_escape_string($this->conn,$brSedista);
			
			$userID=$_SESSION["user"]["idKorisnik"];
			$timestamp = date('Y-m-d H:i:s', strtotime($datum));
			if($brSedista<1 or $brSedista>50)
			{
				$this->setResult(false);
				return;
			}
			$sql = "INSERT INTO rezervacija (datum,let,korisnik,brojSedista) VALUES ('$timestamp',$letId,$userID,$brSedista)";
			
		if(mysqli_query($this->conn, $sql)){
			$this->setResult(true);
		}else{
			$this->setResult(false);
		};

	}

	public function unosLeta($gradOd,$gradDo,$klasa,$cena) {

			$gradOd = mysqli_real_escape_string($this->conn,$gradOd);
			$gradDo = mysqli_real_escape_string($this->conn,$gradDo);
			$klasa = mysqli_real_escape_string($this->conn,$klasa);
			$cena = mysqli_real_escape_string($this->conn,$cena);

			$data = Array (
	    "gradOd" => $gradOd,
	    "gradDo" => $gradDo,
		
	    
	    );

				$zaSlanje = json_encode($data);

				$curl_zahtev = curl_init("http://localhost/rezervacije/api/unosLeta.json");
				curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
				curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $zaSlanje);
				curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
				$curl_odgovor = curl_exec($curl_zahtev);
				$curl_odgovor = curl_exec($curl_zahtev);
				$json_objekat=json_decode($curl_odgovor, true);
				curl_close($curl_zahtev);
			$q = mysqli_query($this->conn, "INSERT INTO let (mestoOd,mestoDo,klasa,cena) VALUES ('$gradOd','$gradDo',$klasa,'$cena')");
			if($q == "Uspesno!") {
				$this->setResult(true);
			}
			else {
				$this->setResult(false);
			}
				/*if($json_objekat == "Uspesno!") {
					$this->setResult(true);
				}
				else {
					$this->setResult(false);
				}
*/
	}


	public function izmenaLet($mestoOd,$klasa,$cena) {

		$mestoOd = mysqli_real_escape_string($this->conn,$mestoOd);
	
		$klasa = mysqli_real_escape_string($this->conn,$klasa);
		$cena = mysqli_real_escape_string($this->conn,$cena);
	
		if(mysqli_query($this->conn, "UPDATE let SET klasa=$klasa,cena='$cena' WHERE id=$mestoOd")){
			$this->setResult(true);
		}else{
			$this->setResult(false);
		};

	}



}

?>