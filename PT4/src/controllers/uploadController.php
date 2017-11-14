<?php

namespace PT4\src\controllers;

use PT4\core\Controller;

class uploadController extends Controller
{
	public function upload()
	{
		if($this->isConnected())
		{
			$this->uploadHandler();
		}

		else
		{
			header('Location:home');
		}
	}

	public function uploadHandler()
	{
		$this->getSession();

		$displayForm = true;

		if(isset($_POST['submit']))
		{
			if(isset($_FILES) && !empty($_FILES))
			{
				if($_FILES['file']['error'] != 0)
				{
					switch ($_FILES['file']['error'])
					{
						case 2:
							$_SESSION['flashbagMsgErrors'] = '<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Fichier trop volumineux (Max. 1Mo) </div>';
							break;
						case 3:
							$_SESSION['flashbagMsgErrors'] = '<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Fichier corrompu </div>';
							break;
						case 4:
							$_SESSION['flashbagMsgErrors'] = '<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Aucun fichier spécifié </div>';
							break;
						default:
							$_SESSION['flashbagMsgErrors'] = '<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Erreur rencontrée durant l\'upload </div>';
							break;
					}
				}

				else
				{
					$extension_valide = array('gpx');
					$extension_upload = strtolower(substr(strrchr($_FILES['file']['name'],'.'),1));

					if(!(in_array($extension_upload, $extension_valide)))
					{
						$_SESSION['flashbagMsgErrors'] = '<div class="custom-error"><span class="glyphicon glyphicon-remove"></span> Type de fichier incorrect </div>';
					}

					else
					{
						$_SESSION['flashbagMsgSuccess'] = '<div class="custom-success"><span class="glyphicon glyphicon-ok"></span> Fichier conforme, chargement de la carte... </div>';
						$displayForm = false;
						$xml = simplexml_load_file($_FILES['file']['tmp_name']);
						$trkpt = $xml
							->trk
							->trkseg
						;
						$ensemblePoints = array();
						$limit = 0;
						foreach($trkpt->children() as $child)
						{
							if($limit < 100)
							{
								array_push(
									$ensemblePoints,
									array(
										"lat" => (string)$child['lat'],
										"lon" => (string)$child['lon']
									)
								);
							}

							else
							{
								break;
							}

							$limit++;
						}

						$parameters = "";
						foreach ($ensemblePoints as $point)
						{
							$parameters .= $point['lat'];
							$parameters .= ', ';
							$parameters .= $point['lon'];
							if($point != end($ensemblePoints))
							{
								$parameters .= '|';
							}
						}

						$_SESSION['points'] = $parameters;
						header("refresh:3;url=carte");
					}
				}
			}
		}

		$flashBag = $this->getFlashBag();

		$this->render(
			'upload',
			array(
				"head" => $this->renderHead('default'),
				"uploadMenu" => $this->renderMenu('choixMenu'),
				"uploadForm" => $this->renderForm('upload'),
				"success" => $flashBag['success'],
				"error" => $flashBag['error'],
				"footer" => $this->renderFooter('footer')
			)
		);
	}
}