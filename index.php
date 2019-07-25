<!DOCTYPE html>
<html>
<head>
    <title>Data BMKG Gempa</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body ng-app="myAPP" ng-controller="dataCtrl">
    <h1>Data Gempa Terkini BMKG</h1>
    <input type="text" ng-model="cari" placeholder="Cari Data">

    <table border="1">
        <tr>
            <td>NO</td>
            <td ng-click="orderByMe('Tanggal')">Tanggal</td>
            <td ng-click="orderByMe('Jam')">Jam</td>
            <td class="magnitude" ng-click="orderByMe('Magnitude')">Skala</td>
            <td ng-click="orderByMe('Kedalaman')">Kedalaman</td>
            <td ng-click="orderByMe('Lintang')">Lintang</td>
            <td ng-click="orderByMe('Bujur')">Bujur</td>
            <td ng-click="orderByMe('Wilayah')">Wilayah</td>
            <td>Koordinat</td>
        </tr>

        <tr ng-repeat="x in gempa | filter:cari | orderBy: myOrderBy">
            <td>{{$index + 1}}</td>
            <td>{{x.Tanggal}}</td>
            <td>{{x.Jam}}</td>
            <td>{{x.Magnitude}}</td>
            <td>{{x.Kedalaman}}</td>
            <td>{{x.Lintang}}</td>
            <td>{{x.Bujur}}</td>
            <td>{{x.Wilayah}}</td>
            <td>{{x.point.coordinates}}</td>
        </tr>
    </table>

    <script>
        var app = angular.module('myAPP', []);

        app.controller('dataCtrl', function($scope,$http) {
            // pemanggilan gempa.php
            $http.get('gempa.php').then(function(response) {
                // respon data json
                $scope.gempa = response.data.gempa;
            });

            // untuk filter data sesuai abjad
            $scope.orderByMe = function(x) {
                $scope.myOrderBy = x;
            };
        });
    </script>
</body>
</html>
