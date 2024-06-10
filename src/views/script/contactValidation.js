function sendEmail(){

    if(document.dados.name.value == "" || document.dados.name.legth < 8)
    {
        alert("Preencha O Campo Nome Corretamente!");
        document.dados.name.focus();
        return false;
    }


    if(document.dados.email.value == "" || document.dados.email.value.indexOf('@') ==-1 ||
    document.dados.email.value.indexOf('.')==-1)
    {
        alert("Preencha O Campo Email Corretamente!");
        document.dados.email.focus();
        return false;
    }

    if (document.dados.message.value == '')
    {
        alert("E Necessario Preencher O Campo Mensagem!");
        document.dados.message.focus();
        return false;
    }
  

    if(document.dados.value != '')
    {
        alert("Mensagem enviada com Sucesso!");
    }

}