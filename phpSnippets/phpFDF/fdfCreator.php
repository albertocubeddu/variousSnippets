<?php
/*
Author: Alberto Cubeddu
Description : Simple class that create an FDF, fill up a PDF (preformatted) and retrive a base64png convert it to PDF and stamp on the final PDF. 
This class use facade pattern.

THIS CLASS IS NOT SUPPOSED TO WORK, is just an example of how the flow has to be!
*/


class fdfCreator{
	private $filenameFdf;
	private $filenameSign;
	private $filenamePdf;

	public function __constructor($filenameFdf, $filenameSign){
		$this->filenameFdf = $filenameFdf;
		$this->filenameSign = $filenameSign;
		$this->filenamePdf = "final.pdf";
	}

	public function FdfCreator(){
		$this->createFdf();
		$this->writeFdf();
		$this->fillUpPdf();
		$this->retriveAndSaveSign();
		$this->convertPngToPdf();
		$this->addSignToPdf();
	}

	private function createFdf(){
		//WHERE : <</T(label)/V(value)>>
		$fdf = "%FDF-1.2
			1 0 obj<</FDF<< /Fields[
			<</T(fdfLabel1)/V($var1)>>
			<</T(fdfLabel2)/V($var2)>>
			<</T(fdfLabel3)/V($var3)>>
			] >> >>
			endobj
			trailer
			<</Root 1 0 R>>
			%%EOF";
	}

	private function writeFdf(){
		//Write the FDF on the HDD
		file_put_contents($filenameFdf, $fdf);
	}

	private function fillUpPdf(){
		//Execute pdfTK to fillup the form
		exec("pdftk pdfFileName.pdf fill_form ".$filenameFdf." output ".$filenamePdf." flatten"); 
	}

	private function retriveAndSaveSign(){
		//we assume that someone send us a SIGN....
		$data_uri = 0; //this is the base64 png SIGN
		$data_pieces = explode(",", $data_uri);
		$encoded_image = $data_pieces[1];
		$decoded_image = base64_decode($encoded_image);

		$signPlace = "sign.png";
		file_put_contents($filenameSign,$decoded_image);
	}

	private function convertPngToPdf(){
		$finalSignaturePdf = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filenameSign);
		//add the pdf extension
		$finalSignaturePdf = $finalSignaturePdf.".pdf";
		exec("convert -channel rgba -alpha on PNG32:{$finalSignature} -transparent white -background none -resize 150 -gravity SouthWest -extent 595x842-30-25 -channel rgba -alpha on {$finalSignaturePdf}");
	}
	
	private function addSignToPdf(){
		exec("pdftk {$filenamePdf} stamp {$finalSignaturePdf} output {$filenamePdf}");
	}

}
		

?>