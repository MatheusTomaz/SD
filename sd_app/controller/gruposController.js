var moduloGrupos = angular.module('moduloGrupos', [ 'ui.bootstrap']);

moduloGrupos.controller('controllerGrupos', function($scope, $http, $window, $filter, $compile, $modal) {

    $scope.abrirModalModificarConta = function(conta) {

        var modalInstance = $modal.open({
              templateUrl: 'idModalGrupos',
              controller: modalControlerGrupos,
              size: 'md',
              resolve: {
                  contaParametro: function () {
                  return conta;
                }
              }
            });

        modalInstance.result.then(function (parametro) {

            console.log("olá gente!");
        });
    };
});

var modalControlerGrupos = function ($scope, $modalInstance, $http, contaParametro) {


    $scope.modificarConta = function () {

        };
        $scope.fechar = function () {
        $modalInstance.dismiss('obrigado por fachar');
    };
};

