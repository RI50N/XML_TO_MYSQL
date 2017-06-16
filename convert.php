<?PHP
require('_app/Config.inc.php');
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
// ---------------------------------------------------------------------------------
var_dump($json->Nfse->InfNfse->Servico->Valores->ValorServicos);echo "<br>";
var_dump($json->Nfse->InfNfse->Servico->Valores->IssRetido);echo "<br>";
var_dump($json->Nfse->InfNfse->Servico->Valores->BaseCalculo);echo "<br>";
var_dump($json->Nfse->InfNfse->Servico->Valores->ValorLiquidoNfse);echo "<br>";
var_dump($json->Nfse->InfNfse->Servico->ItemListaServico);echo "<br>";
var_dump($json->Nfse->InfNfse->Servico->CodigoTributacaoMunicipio);echo "<br>";
var_dump($json->Nfse->InfNfse->Servico->Discriminacao);echo "<br>";
var_dump($json->Nfse->InfNfse->Servico->CodigoMunicipio);echo "<br>";
// ---------------------------------------------------------------------------------
var_dump($json->Nfse->InfNfse->PrestadorServico->IdentificacaoPrestador->Cnpj);echo "<br>";
var_dump($json->Nfse->InfNfse->PrestadorServico->IdentificacaoPrestador->InscricaoMunicipal);echo "<br>";
var_dump($json->Nfse->InfNfse->PrestadorServico->RazaoSocial);echo "<br>";
var_dump($json->Nfse->InfNfse->PrestadorServico->Endereco->Endereco);echo "<br>";
var_dump($json->Nfse->InfNfse->PrestadorServico->Endereco->Numero);echo "<br>";
var_dump($json->Nfse->InfNfse->PrestadorServico->Endereco->Bairro);echo "<br>";
var_dump($json->Nfse->InfNfse->PrestadorServico->Endereco->CodigoMunicipio);echo "<br>";
var_dump($json->Nfse->InfNfse->PrestadorServico->Endereco->Uf);echo "<br>";
var_dump($json->Nfse->InfNfse->PrestadorServico->Endereco->Cep);echo "<br>";
// ---------------------------------------------------------------------------------
var_dump($json->Nfse->InfNfse->TomadorServico->IdentificacaoTomador->CpfCnpj->Cpf);echo "<br>";
var_dump($json->Nfse->InfNfse->TomadorServico->RazaoSocial);echo "<br>";
var_dump($json->Nfse->InfNfse->TomadorServico->Endereco->Endereco);echo "<br>";
var_dump($json->Nfse->InfNfse->TomadorServico->Endereco->Numero);echo "<br>";
var_dump($json->Nfse->InfNfse->TomadorServico->Endereco->Complemento);echo "<br>";
var_dump($json->Nfse->InfNfse->TomadorServico->Endereco->Bairro);echo "<br>";
var_dump($json->Nfse->InfNfse->TomadorServico->Endereco->CodigoMunicipio);echo "<br>";
var_dump($json->Nfse->InfNfse->TomadorServico->Endereco->Uf);echo "<br>";
var_dump($json->Nfse->InfNfse->TomadorServico->Endereco->Cep);echo "<br>";
var_dump($json->Nfse->InfNfse->TomadorServico->Contato->Email);echo "<br>";
// ---------------------------------------------------------------------------------
var_dump($json->Nfse->InfNfse->OrgaoGerador->CodigoMunicipio);echo "<br>";
var_dump($json->Nfse->InfNfse->OrgaoGerador->Uf);echo "<br>";
