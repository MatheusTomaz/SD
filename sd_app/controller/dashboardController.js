var moduloDashboard = angular.module('moduloDashboard', [ 'ui.bootstrap']);

moduloDashboard.controller('controllerDashboard', function($scope, $http, $window, $filter, $compile, $modal) {

    var idAdd = $('#idSession').val();

    $(document).ready(function(){
        $http.post('controller/numSolicitacao.php', {"idAdd" : idAdd}).success(function(data) {
            // Coloca o autocomplemento
            console.log(data);
            // JSON retornado do banco

            $scope.numSolicitacao = data[0].num;

        }).error(function(data) {
            // Se deu algum erro, mostro no log do console
            console.log("Ocorreu um erro no banco de dados ao trazer auto-ajuda da home");
        });
    });

    $scope.buscaSolicitacao = function(idAdd){

        $http.post('controller/buscaSolicitacao.php', {"idAdd" : idAdd}).success(function(data) {
            // Coloca o autocomplemento
            console.log(data);
            // JSON retornado do banco

            $scope.solicitacoes = data;

        }).error(function(data) {
            // Se deu algum erro, mostro no log do console
            console.log("Ocorreu um erro no banco de dados ao trazer auto-ajuda da home");
        });
    };

});

var modalControlerDashboard = function ($scope, $modalInstance, $http, contaParametro) {

    $scope.adicionarAmigo = function(idAdd,idAcc){

        var contAmigoNAdd = "<i class='fa fa-check'></i> Solicitação enviada";
        var contains = $("#addAmigoBtn"+idAcc).contents()[1]['textContent'];

        if(contains == " Adicionar"){
            contains = true;
        }else if(contains == " Amigos"){
            contains = false;
        }

        if (contains){
            $('#addAmigoBtn'+idAcc).html('');
            $('#addAmigoBtn'+idAcc).append(contAmigoNAdd);
        }

        $http.post('controller/adicionarAmigo.php', { "idAdd" : idAdd, "idAcc" : idAcc}).success(function(data) {
            // console.log("oi");
            // Coloca o autocomplemento
            document.getElementById("autocomplete").style.display = "";
            alert(data.value);
        }).error(function(data) {
            // Se deu algum erro, mostro no log do console
            console.log("Ocorreu um erro no banco de dados ao trazer auto-ajuda da home");
        });

    }

    $scope.pesquisar = function(pesquisa,idAdd){

        // Se a pesquisa for vazia
        if (pesquisa == ""){

            // Retira o autocomplete
            document.getElementById("pesquisarPessoas").style.display = "none";

        }else{

            // Pesquisa no banco via AJAX
            $http.post('controller/pesquisarPessoas.php', { "data" : pesquisa, "idAdd" : idAdd}).success(function(data) {

                // Coloca o autocomplemento
                document.getElementById("pesquisarPessoas").style.display = "";

                // JSON retornado do banco
                $scope.dicas = data;

            }).error(function(data) {
                // Se deu algum erro, mostro no log do console
                console.log("Ocorreu um erro no banco de dados ao trazer auto-ajuda da home");
            });
        }
    };

    $scope.fechar = function () {
        $modalInstance.dismiss('obrigado por fechar');
    };
};

