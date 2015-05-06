var moduloAmigos = angular.module('moduloAmigos', [ 'ui.bootstrap']);

moduloAmigos.controller('controllerAmigos', function($scope, $http, $window, $filter, $compile, $modal) {

    $scope.pesquisar = function(pesquisa){

        // Se a pesquisa for vazia
        if (pesquisa == ""){

            // Retira o autocomplete
            document.getElementById("autocomplete").style.display = "none";

        }else{

            // Pesquisa no banco via AJAX
            $http.post('controller/autocomplete.php', { "data" : pesquisa}).success(function(data) {

                // Coloca o autocomplemento
                document.getElementById("autocomplete").style.display = "";

                // JSON retornado do banco
                $scope.dicas = data;

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



    $scope.pesquisar = function(pesquisa){

        // Se a pesquisa for vazia
        if (pesquisa == ""){

            // Retira o autocomplete
            document.getElementById("pesquisarPessoas").style.display = "none";

        }else{

            // Pesquisa no banco via AJAX
            $http.post('controller/pesquisarPessoas.php', { "data" : pesquisa}).success(function(data) {

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

