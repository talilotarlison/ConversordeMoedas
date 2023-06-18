<html>
<head>
    <meta charset="utf-8">
    <link href="styles.css" rel="stylesheet">
    <title>Welcome to PHPSandbox</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,531;0,600;0,700;0,800;0,900;1,400;1,500;1,531;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  
</head>
<body>
<section>
  <h1>Conversor de Moedas</h1>
<?php

$url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=%2706-10-2023%27&@dataFinalCotacao=%2706-17-2023%27&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao'; 

$dados = json_decode(file_get_contents($url), true);



$cotacao = $dados["value"][0]["cotacaoCompra"];

$valor = $_REQUEST["valorReal"] ?? 25;

$resultado = ($valor /$cotacao);
//forma mais facil de fazer 
//$number = number_format($valor, 2, ",",".");
//$number = sprintf('%.2f', $resultado);

//forma mais profissional

$padrao = numfmt_create('pt_BR', NumberFormatter::CURRENCY);

echo "O valor do seu dinherio é " ."<strong>" . numfmt_format_currency($padrao, $valor, "BRL") ."</strong>". " em reais";
echo "<br> O valor em dolar é :" ."<strong>".  numfmt_format_currency($padrao, $resultado, "USD") ."</strong>" ;
?>
 <button id="botao2" onClick="javascript:history.go(-1) " value="Voltar">Voltar</button>
</section>
<!--onClick="javascript:history.location.href='index.html')" -->
</div>
</body>
</html>
