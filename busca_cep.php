<html>
  <head>

    <title>Exemplo de Busca de Endereço por CEP - Carlos Reche</title>

    <script type="text/javascript">

 

function addEvent(obj, evt, func) {

  if (obj.attachEvent) {

    return obj.attachEvent(("on"+evt), func);

  } else if (obj.addEventListener) {

    obj.addEventListener(evt, func, true);

    return true;

  }

  return false;

}

 

function XMLHTTPRequest() {

  try {

    return new XMLHttpRequest(); // FF, Safari, Konqueror, Opera, ...

  } catch(ee) {

    try {

      return new ActiveXObject("Msxml2.XMLHTTP"); // activeX (IE5.5+/MSXML2+)

    } catch(e) {

      try {

        return new ActiveXObject("Microsoft.XMLHTTP"); // activeX (IE5+/MSXML1)

      } catch(E) {

        return false; // doesn't support

      }

    }

  }

}

 

function buscarEndereco() {

  var campos = {

    cep: document.getElementById("cep"),

    logradouro: document.getElementById("logradouro"),

    numero: document.getElementById("numero"),

    bairro: document.getElementById("bairro"),

    localidade: document.getElementById("localidade"),

    uf: document.getElementById("uf")

  };

  var ajax = XMLHTTPRequest();

  ajax.open("GET", ("./endereco.txt.php?cep=" + campos.cep.value.replace(/[^\d]*/, "")), true);

  ajax.onreadystatechange = function() {

    if (ajax.readyState == 1) {

      campos.logradouro.disabled = true;

      campos.bairro.disabled = true;

      campos.localidade.disabled = true;

      campos.uf.disabled = true;

      campos.logradouro.value = "carregando...";

      campos.bairro.value = "carregando...";

      campos.localidade.value = "carregando...";

    } else if (ajax.readyState == 4) {

      var r = ajax.responseText, i, logradouro, numero, bairro, localidade, uf;

      logradouro = r.substring(0, (i = r.indexOf(';')));

      r = r.substring(++i);

      numero = r.substring(0, (i = r.indexOf(';')));

      r = r.substring(++i);

      bairro = r.substring(0, (i = r.indexOf(';')));

      r = r.substring(++i);

      localidade = r.substring(0, (i = r.indexOf(';')));

      r = r.substring(++i);

      uf = r.substring(0, (i = r.indexOf(';')));

      campos.logradouro.disabled = false;

      campos.bairro.disabled = false;

      campos.localidade.disabled = false;

      campos.uf.disabled = false;

      campos.logradouro.value = logradouro;

      campos.bairro.value = bairro;

      campos.localidade.value = localidade;

      i = campos.uf.options.length;

      while (i--) {

        if (campos.uf.options.getAttribute("value") == uf) {

          break;

        }

      }

      campos.uf.selectedIndex = i;

    }

  };

  ajax.send(null);

}

 

 

window.addEvent(

  window,

  "load",

  function() {window.addEvent(document.getElementById("cep"), "blur", buscarEndereco);}

);

 

    </script>

    <style type"text/css">

 

body {

  margin: 0;

  padding: 30px 50px;

  font: 70% Verdana, Arial, sans-serif;

}

h1 {font-size: 140%;}

form {margin: 30px 50px 0;}

form fieldset {

  float: left;

  padding: 0 20px 10px;

  background: #e5e5e5;

  border-style: solid;

  border-width: 1px 2px 2px 1px;

  border-color: #AAA;

}

form legend {

  margin-bottom: 15px;

  padding: 5px 10px;

  background: #F5F5F5;

  border-style: solid;

  border-width: 1px 2px 2px 1px;

  border-color: #AAA;

  font-weight: bold;

}

form p {

  float: left;

  clear: both;

  margin: 0;

}

form label {

  float: left;

  clear: left;

  display: block;

  width: 90px;

  height: 30px;

  margin-right: 5px;

  padding-top: 3px;

  cursor: pointer;

  text-align: right;

  color: #C00;

}

form label.numero {clear: none; width: 60px;}

form label.uf {clear: none; width: 30px;}

form input {float: left; width: 200px;}

form input#numero, form input#uf {width: 50px;}

form input#bt-submit {width: 100px; margin-left: 150px;}

address {clear: both; padding: 30px 0;}

 

    </style>

  </head>

 

  <body>

    <h1>Exemplo de Busca de Endereço por CEP</h1>

    <form action="#" method="post">

      <fieldset>

        <legend>Dados Pessoais</legend>

        <p>

          <label for="nome">Nome</label>

          <input type="text" name="nome" id="nome" />

        </p>

        <p>

          <label for="email">E-mail</label>

          <input type="text" name="email" id="email" />

        </p>

        <p>

          <label for="cep">CEP</label>

          <input type="text" name="cep" id="cep" />

        </p>

        <p>

          <label for="logradouro">Logradouro</label>

          <input type="text" name="logradouro" id="logradouro" />

          <label for="numero" class="numero">Número</label>

          <input type="text" name="numero" id="numero" />

        </p>

        <p>

          <label for="complemento">Complemento</label>

          <input type="text" name="complemento" id="complemento" />

        </p>

        <p>

          <label for="bairro">Bairro</label>

          <input type="text" name="bairro" id="bairro" />

        </p>

        <p>

          <label for="localidade">Localidade</label>

          <input type="text" name="localidade" id="localidade" />

          <label for="uf" class="uf">UF</label>

          <select id="uf">

            <option value="">-- selecione --</option>

            <option value="AC">Acre</option>

            <option value="AL">Alagoas</option>

            <option value="AP">Amapá</option>

            <option value="AM">Amazonas</option>

            <option value="BA">Bahia</option>

            <option value="CE">Ceará</option>

            <option value="DF">Distrito Federal</option>

            <option value="ES">Espírito Santo</option>

            <option value="GO">Goiás</option>

            <option value="MA">Maranhão</option>

            <option value="MT">Mato Grosso</option>

            <option value="MS">Mato Grosso do Sul</option>

            <option value="MG">Minas Gerais</option>

            <option value="PA">Pará</option>

            <option value="PB">Paraíba</option>

            <option value="PR">Paraná</option>

            <option value="PE">Pernambuco</option>

            <option value="PI">Piauí</option>

            <option value="RJ">Rio de Janeiro</option>

            <option value="RN">Rio Grande do Norte</option>

            <option value="RS">Rio Grande do Sul</option>

            <option value="RO">Rondônia</option>

            <option value="RR">Roraima</option>

            <option value="SC">Santa Catarina</option>

            <option value="SP">São Paulo</option>

            <option value="SE">Sergipe</option>

            <option value="TO">Tocantins</option>

          </select>

        </p>

        <p>

          <input type="submit" id="bt-submit" value="Enviar" />

        </p>

      </fieldset>

    </form>

    <address>

      Carlos Reche (<a href="mailto:carlosreche@yahoo.com">carlosreche@yahoo.com</a>)

    </address>

  </body>

</html>