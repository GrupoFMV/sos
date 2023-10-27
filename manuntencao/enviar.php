<!doctype html>
<html>
<head>
<meta charset="utf-8">

</head>
	<!-- Global site tag (gtag.js) - Google Ads: 10837373344 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10837373344"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10837373344');
</script>

<!-- Event snippet for Enviar formulário de lead Manutenção conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-10837373344/7qygCO6olpQDEKDj1K8o'});
</script>

	

<body>
</body>
</html>

<?php
include "conexao.php";
@$conn->query($insert = "INSERT INTO leads (nome,telefone,interesse) VALUES ('$_POST[nome]','$_POST[telefone]','Manutencao')"); 
?>

<script>
        window.location.href = "https://api.whatsapp.com/send?phone=5531998814987&text=Ol%C3%A1%20me%20chamo%20xxx%20e%20gostaria%20de mais%20detalhes%20sobre%20Manuten%C3%A7%C3%A3o%20de%20Elevadores";
    </script>