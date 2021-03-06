var moduloAmigos = angular.module('moduloAmigos', [ 'ui.bootstrap']);

moduloAmigos.controller('controllerAmigos', function($scope, $http, $window, $filter, $compile, $modal) {

    $scope.pesquisar = function(pesquisa,idAdd){

        // Se a pesquisa for vazia
        if (pesquisa == ""){

            // Retira o autocomplete
            document.getElementById("autocomplete").style.display = "none";
        }else{
            $scope.buscas = 0;
            // Pesquisa no banco via AJAX
            $http.post('controller/autocomplete.php', { "data" : pesquisa, "idAdd" : idAdd}).success(function(data) {
                // console.log("oi");
                // Coloca o autocomplemento
                document.getElementById("autocomplete").style.display = "";
                // JSON retornado do banco
                if(data[0].id != 0){
                    $scope.buscas = data;
                }
            }).error(function(data) {
                // Se deu algum erro, mostro no log do console
                console.log("Ocorreu um erro no banco de dados ao trazer auto-ajuda da home");
            });
        }
    };


    $scope.abrirModalAmigos = function(conta) {

        var modalInstance = $modal.open({
            templateUrl: 'idModalPesquisarAmigos',
            controller: modalControlerAmigos,
            size: 'md',
            windowClass: 'modal-amigos',
            resolve: {
                contaParametro: function () {
                    return 'oi';
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
            console.log(selectedItem);
        });
    };
});

var modalControlerAmigos = function ($scope, $modalInstance, $http, contaParametro) {

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

