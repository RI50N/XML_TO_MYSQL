<?PHP
// $xml = simplexml_load_string($_FILES["XMLs"][0]);
// $json = json_encode($xml);
// $array = json_decode($json,TRUE);

$myfile =  simplexml_load_file($_FILES["XMLs"] ["tmp_name"][0]);

$json = json_encode($myfile);
$json = json_decode($json);
var_dump($json->Nfse->InfNfse->Numero);echo "<br>";
var_dump($json->Nfse->InfNfse->CodigoVerificacao);echo "<br>";
var_dump($json->Nfse->InfNfse->DataEmissao);echo "<br>";
var_dump($json->Nfse->InfNfse->NaturezaOperacao);echo "<br>";
var_dump($json->Nfse->InfNfse->RegimeEspecialTributacao);echo "<br>";
var_dump($json->Nfse->InfNfse->OptanteSimplesNacional);echo "<br>";
var_dump($json->Nfse->InfNfse->IncentivadorCultural);echo "<br>";
var_dump($json->Nfse->InfNfse->Competencia);echo "<br>";
var_dump($json->Nfse->InfNfse->NfseSubstituida);echo "<br>";
var_dump($json->Nfse->InfNfse->Servico);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
var_dump($json->Nfse->InfNfse->Numero);
foreach($json as $registro):
    echo  $registro->Nfse;
endforeach;

// $array = json_decode($json,TRUE);
