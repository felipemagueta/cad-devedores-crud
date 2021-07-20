<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="<?= URLBASE ?>assets/js/jquery-3.6.0.min.js"></script>
<script src="<?= URLBASE ?>assets/js/jquery.mask.js"></script>
<script src="<?= URLBASE ?>assets/js/jquery.maskMoney.min.js"></script>
<script>
 
    $(document).ready(function() {
        $('.estado').mask('AA');
        $('.data').mask('00/00/0000', {
            clearIfNotMatch: true
        });
        $('.cep').mask('00000-000', {
            clearIfNotMatch: true
        });
        $('.telefone').mask('(00) 00000-0000');

        $('.valor').maskMoney({
            thousands: '',
            decimal: '.',
            allowZero: true,
            suffix: '',
            clearIfNotMatch: true
        });  
        
        maskCpf = function(){
            var cpfcnpjlen = $('.cpfcnpj').val().length; 
            if(cpfcnpjlen<14){
                $('.cpfcnpj').mask('000.000.000-00');
            } else {
                $('.cpfcnpj').mask('00.000.000/0000-00');                
            } 
        } 
        $('.cpfcnpj').keyup(function(){
            maskCpf();
        })   
        if(document.getElementById('cpf_cnpj')){ 
            maskCpf();
        }

    });
</script>

<script src="<?= URLBASE ?>assets/plugins/ckeditor/js/ckeditor.js"></script>
<script src="<?= URLBASE ?>assets/plugins/ckeditor/js/sample.js"></script>
<script src="<?= URLBASE ?>assets/plugins/ckeditor/js/sf.js"></script>
<script> 
    if(document.getElementById('descricao_titulo')){
        CKEDITOR.replace('descricao_titulo');
    } 
    if(document.getElementById('descricao_historico')){
        CKEDITOR.replace('descricao_historico');
    } 
</script>


<script>
    function loadEndereco() {
        var cep = $.trim($('#cep').val());
        cep = cep.replace(".", "");

        //Consulta o webservice viacep.com.br/
        $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
                $("#logradouro").val(dados.logradouro);
                $("#bairro").val(dados.bairro);
                $("#cidade").val(dados.localidade);
                $("#estado").val(dados.uf);

            } //end if.
            else {
                $("#endereco").focus();
            } 
        });
    }
</script>