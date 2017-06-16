
<?PHP
require('Config.inc.php');
$myfile =  simplexml_load_file($_FILES["XMLs"] ["tmp_name"][0]);
$json = json_encode($myfile);
$json = json_decode($json);

$create = new Create();
$Nfse_create = new Create();
$Nfse_Servico_create = new Create();
$Servico_Valores_create = new Create();
$endereco_prestador_create = new Create();
$Nfse_PrestadorServico_create = new Create();
$endereco_tomador_create = new Create();
$Nfse_TomadorServico_create = new Create();

foreach ($_FILES["XMLs"] ["tmp_name"] as $key) {
  $myfile =  simplexml_load_file($key);
  $json = json_encode($myfile);
  $json = json_decode($json);


  $Nfse = array(
  'Numero'  => isset($json->Nfse->InfNfse->Numero) ? $json->Nfse->InfNfse->Numero : "",
  'CodigoVerificacao' => isset($json->Nfse->InfNfse->CodigoVerificacao) ? $json->Nfse->InfNfse->CodigoVerificacao : "",
  'DataEmissao' => isset($json->Nfse->InfNfse->DataEmissao) ? $json->Nfse->InfNfse->DataEmissao : "",
  'NaturezaOperacao' => isset($json->Nfse->InfNfse->NaturezaOperacao) ? $json->Nfse->InfNfse->NaturezaOperacao : "",
  'RegimeEspecialTributacao' => isset($json->Nfse->InfNfse->RegimeEspecialTributacao) ? $json->Nfse->InfNfse->RegimeEspecialTributacao : "",
  'OptanteSimplesNacional' => isset($json->Nfse->InfNfse->OptanteSimplesNacional) ? $json->Nfse->InfNfse->OptanteSimplesNacional : "",
  'IncentivadorCultural' => isset($json->Nfse->InfNfse->IncentivadorCultural) ? $json->Nfse->InfNfse->IncentivadorCultural : "",
  'Competencia' => isset($json->Nfse->InfNfse->Competencia) ? $json->Nfse->InfNfse->Competencia : "",
  'NfseSubstituida' => isset($json->Nfse->InfNfse->NfseSubstituida) ? $json->Nfse->InfNfse->NfseSubstituida : ""
  );
  $Nfse_create->ExeCreate('Nfse',$Nfse);

  if($Nfse_create->getResult()){
    $Nfse_Servico = array(
    'id_nfse' => $Nfse_create->getResult(),
    'ItemListaServico'  => isset($json->Nfse->InfNfse->Servico->ItemListaServico) ? $json->Nfse->InfNfse->Servico->ItemListaServico : "",
    'CodigoTributacaoMunicipio' => isset($json->Nfse->InfNfse->Servico->CodigoTributacaoMunicipio) ? $json->Nfse->InfNfse->Servico->CodigoTributacaoMunicipio : "",
    'Discriminacao' => isset($json->Nfse->InfNfse->Servico->Discriminacao) ? $json->Nfse->InfNfse->Servico->Discriminacao : "",
    'CodigoMunicipio' => isset($json->Nfse->InfNfse->Servico->CodigoMunicipio) ? $json->Nfse->InfNfse->Servico->CodigoMunicipio : ""
    );
    $Nfse_Servico_create->ExeCreate('Nfse_Servico',$Nfse_Servico);

    $Servico_Valores = array(
    'id_servico' => $Nfse_Servico_create->getResult(),
    'ValorServicos'  => isset($json->Nfse->InfNfse->Servico->Valores->ValorServicos) ? $json->Nfse->InfNfse->Servico->Valores->ValorServicos : "",
    'IssRetido' => isset($json->Nfse->InfNfse->Servico->Valores->IssRetido) ? $json->Nfse->InfNfse->Servico->Valores->IssRetido : "",
    'BaseCalculo' => isset($json->Nfse->InfNfse->Servico->Valores->BaseCalculo) ? $json->Nfse->InfNfse->Servico->Valores->BaseCalculo : "",
    'ValorLiquidoNfse' => isset($json->Nfse->InfNfse->Servico->Valores->ValorLiquidoNfse) ? $json->Nfse->InfNfse->Servico->Valores->ValorLiquidoNfse : ""
    );
    $Servico_Valores_create->ExeCreate('Servico_Valores',$Servico_Valores);

    $endereco_prestador = array(
    'Endereco'  => isset($json->Nfse->InfNfse->PrestadorServico->Endereco->Endereco) ? $json->Nfse->InfNfse->PrestadorServico->Endereco->Endereco : "",
    'Numero' => isset($json->Nfse->InfNfse->PrestadorServico->Endereco->Numero) ? $json->Nfse->InfNfse->PrestadorServico->Endereco->Numero : "",
    'Bairro' => isset($json->Nfse->InfNfse->PrestadorServico->Endereco->Bairro) ? $json->Nfse->InfNfse->PrestadorServico->Endereco->Bairro : "",
    'CodigoMunicipio' => isset($json->Nfse->InfNfse->PrestadorServico->Endereco->CodigoMunicipio) ? $json->Nfse->InfNfse->PrestadorServico->Endereco->CodigoMunicipio : "",
    'Uf' => isset($json->Nfse->InfNfse->PrestadorServico->Endereco->Uf) ? $json->Nfse->InfNfse->PrestadorServico->Endereco->Uf : "",
    'Cep' => isset($json->Nfse->InfNfse->PrestadorServico->Endereco->Cep) ? $json->Nfse->InfNfse->PrestadorServico->Endereco->Cep : ""
    );
    $endereco_prestador_create->ExeCreate('endereco',$endereco_prestador);

    $Nfse_PrestadorServico = array(
    'id_nfse' => $Nfse_create->getResult(),
    'id_endereco' => $endereco_prestador_create->getResult(),
    'RazaoSocial'  => isset($json->Nfse->InfNfse->PrestadorServico->RazaoSocial) ? $json->Nfse->InfNfse->PrestadorServico->RazaoSocial : ""
    );
    $Nfse_PrestadorServico_create->ExeCreate('Nfse_PrestadorServico',$Nfse_PrestadorServico);

    $PrestadorServico_IdentificacaoPrestador = array(
    'id_prestador' => $Nfse_PrestadorServico_create->getResult(),
    'Cnpj'  => isset($json->Nfse->InfNfse->PrestadorServico->IdentificacaoPrestador->Cnpj) ? $json->Nfse->InfNfse->PrestadorServico->IdentificacaoPrestador->Cnpj : "",
    'InscricaoMunicipal'  => isset($json->Nfse->InfNfse->PrestadorServico->IdentificacaoPrestador->InscricaoMunicipal) ? $json->Nfse->InfNfse->PrestadorServico->IdentificacaoPrestador->InscricaoMunicipal : ""
    );
    $create->ExeCreate('PrestadorServico_IdentificacaoPrestador',$PrestadorServico_IdentificacaoPrestador);

    $endereco_tomador = array(
    'Endereco'  => isset($json->Nfse->InfNfse->TomadorServico->Endereco->Endereco) ? $json->Nfse->InfNfse->TomadorServico->Endereco->Endereco : "",
    'Numero' => isset($json->Nfse->InfNfse->TomadorServico->Endereco->Numero) ? $json->Nfse->InfNfse->TomadorServico->Endereco->Numero : "",
    'Complemento' => isset($json->Nfse->InfNfse->TomadorServico->Endereco->Complemento) ? $json->Nfse->InfNfse->TomadorServico->Endereco->Complemento : "",
    'Bairro' => isset($json->Nfse->InfNfse->TomadorServico->Endereco->Bairro) ? $json->Nfse->InfNfse->TomadorServico->Endereco->Bairro : "",
    'CodigoMunicipio' => isset($json->Nfse->InfNfse->TomadorServico->Endereco->CodigoMunicipio) ? $json->Nfse->InfNfse->TomadorServico->Endereco->CodigoMunicipio : "",
    'Uf' => isset($json->Nfse->InfNfse->TomadorServico->Endereco->Uf) ? $json->Nfse->InfNfse->TomadorServico->Endereco->Uf : "",
    'Cep' => isset($json->Nfse->InfNfse->TomadorServico->Endereco->Cep) ? $json->Nfse->InfNfse->TomadorServico->Endereco->Cep : ""
    );
    $endereco_tomador_create->ExeCreate('endereco',$endereco_tomador);

    $Nfse_TomadorServico = array(
    'id_nfse' => $Nfse_create->getResult(),
    'id_endereco' => $endereco_tomador_create->getResult(),
    'RazaoSocial'  => isset($json->Nfse->InfNfse->TomadorServico->RazaoSocial) ? $json->Nfse->InfNfse->TomadorServico->RazaoSocial : ""
    );
    $Nfse_TomadorServico_create->ExeCreate('Nfse_TomadorServico',$Nfse_TomadorServico);


    $TomadorServico_Contato = array(
    'id_tomador_servico' => $Nfse_TomadorServico_create->getResult(),
    'email'  => isset($json->Nfse->InfNfse->TomadorServico->Contato->Email) ? $json->Nfse->InfNfse->TomadorServico->Contato->Email : ""
    );
    $create->ExeCreate('TomadorServico_Contato',$TomadorServico_Contato);

    $TomadorServico_IdentificacaoTomador = array(
    'id_tomador_servico' => $Nfse_TomadorServico_create->getResult(),
    'cpf'  => isset($json->Nfse->InfNfse->TomadorServico->IdentificacaoTomador->CpfCnpj->Cpf) ? $json->Nfse->InfNfse->TomadorServico->IdentificacaoTomador->CpfCnpj->Cpf : "",
    );
    $create->ExeCreate('TomadorServico_IdentificacaoTomador',$TomadorServico_IdentificacaoTomador);

    $Nfse_OrgaoGerador = array(
    'id_nfse' => $Nfse_create->getResult(),
    'CodigoMunicipio'  => isset($json->Nfse->InfNfse->OrgaoGerador->CodigoMunicipio) ? $json->Nfse->InfNfse->OrgaoGerador->CodigoMunicipio : "",
    'Uf'  => isset($json->Nfse->InfNfse->OrgaoGerador->Uf) ? $json->Nfse->InfNfse->OrgaoGerador->Uf : "",
    );
    $create->ExeCreate('Nfse_OrgaoGerador',$Nfse_OrgaoGerador);
  }else{
    echo "falha ao inserir registro";
  }
}
