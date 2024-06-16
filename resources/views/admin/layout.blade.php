<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/main1.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="./text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- ck-editor --}}
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

</head>

<body ng-app="myApp" ng-controller="myCtrl" onload="time()" class="app sidebar-mini rtl">

    <!-- Navbar-->
    @include('admin.partials.header')
    
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    @include('admin.partials.nav')
    <div ng-controller="viewCtrl" class="app-content">
        @if (Route::CurrentRouteName() != 'home-admin')
            <div class="row">
                <div class="col-md-12">
                    <div class="app-title">
                        <ul class="app-breadcrumb breadcrumb mb-0">
                            <li class="breadcrumb-item"><a class="text-decoration-none text-primary"
                                    href="{{ route('home-admin') }}"><b>Bảng điều khiển</b></a></li>
                            <li class="breadcrumb-item"><a class="text-decoration-none text-primary"
                                    href="#"><b>@yield('title')</b></a></li>
                        </ul>
                        <div id="clock"></div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div class="app-title">
                        <ul class="app-breadcrumb breadcrumb mb-0">
                            <li class="breadcrumb-item"><a class="text-decoration-none text-primary"
                                    href="{{ route('home-admin') }}"><b>Bảng điều khiển</b></a></li>
                        </ul>
                        <div id="clock"></div>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </div>

    <script>
        CKEDITOR.replace('mota');
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <script src="{{ asset('asset/js/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/js/popper.min.js') }}"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/js/main.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/js/plugins/pace.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('asset/js/angularAdmin.min.js') }}"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('myCtrl', function($scope, $http) {
            // Function to fetch order information by ID
            $scope.infor_order = function(id) {
                $http.get('/api/manager-order/infor/' + id).then(function(response) {
                    $scope.data = response.data;
                    console.log($scope.data);
                }, function(error) {
                    console.error('Error fetching data:', error);
                });
            };

            // Function to handle status change
            $scope.handel_status = function(status, id_product) {
                var data = {
                    status: status,
                    id_product: id_product
                };

                $http.post('/api/manager-order/status/', data).then(function(response) {
                    $scope.data = response.data.data;
                    console.log($scope.data);

                }, function(error) {
                    console.error('Error fetching data:', error);
                });
            };

            ///MESSAGE ZONE
            $scope.users = [];
            $scope.messages = [];
            $scope.selectedUser = null;
            $scope.adminRole = 'admin';
            $scope.message = '';

            // ID của admin, bạn cần điều chỉnh cho phù hợp

            // Lấy danh sách người dùng
            $http.get('/api/users').then(function(response) {
                $scope.users = response.data;
                console.log($scope.users);
            }, function(error) {
                console.error('Error fetching users:', error);
            });

            // Chọn một user để chat
            $scope.selectUser = function(user) {
                $scope.selectedUser = user;
                $scope.loadMessages(user.id);
            };

            // Lấy tin nhắn giữa admin và user đã chọn
            $scope.loadMessages = function(userId) {
                $http.get('/api/messagesAdmin/' + userId).then(function(response) {
                    $scope.data_msgId = response.data;
                    // $scope.selectedUser = response.data.user;
                    console.log($scope.data_msgId);
                    // console.log($scope.selectedUser);
                }, function(error) {
                    console.error('Error fetching messages:', error);
                });
            };

                

            // Gửi tin nhắn
            $scope.sendMessage = function() {
                // Debugging step: log the current newMessage value
                // console.log('Current message:', $scope.message);
                event.preventDefault();
                var messageInput = document.getElementById("messageInput");
                var message = messageInput.value;
                var messageData = {
                    recipient_id: $scope.selectedUser.id,
                    message: message
                };

                // Debugging step: log the messageData before sending
                console.log('Sending message:', messageData);


                $http.post('/api/messagesAdmin/sent', messageData).then(function(response) {
                    $scope.messages.push(response.data);
                    console.log('Message sent successfully:', response.data);
                    $scope.message = ''; // Clear input
                }, function(error) {
                    console.error('Error sending message:', error);
                });
            };


        });
        var viewFunction = function($scope,$rootScope, $http) {};
    </script>
    @yield('viewFunction')
    <script>
        app.controller('viewCtrl', viewFunction)
    </script>

    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('asset/js/plugins/chart.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript">
        var data = {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
            datasets: [{
                    label: "Dữ liệu đầu tiên",
                    fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
                    strokeColor: "rgb(255, 212, 59)",
                    pointColor: "rgb(255, 212, 59)",
                    pointStrokeColor: "rgb(255, 212, 59)",
                    pointHighlightFill: "rgb(255, 212, 59)",
                    pointHighlightStroke: "rgb(255, 212, 59)",
                    data: [20, 59, 90, 51, 56, 100]
                },
                {
                    label: "Dữ liệu kế tiếp",
                    fillColor: "rgba(9, 109, 239, 0.651)  ",
                    pointColor: "rgb(9, 109, 239)",
                    strokeColor: "rgb(9, 109, 239)",
                    pointStrokeColor: "rgb(9, 109, 239)",
                    pointHighlightFill: "rgb(9, 109, 239)",
                    pointHighlightStroke: "rgb(9, 109, 239)",
                    data: [48, 48, 49, 39, 86, 10]
                }
            ]
        };
        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);
    </script>
    <script type="text/javascript">
        //Thời Gian
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + " giờ " + m + " phút " + s + " giây";
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<span class="date"> ' + today + ' - ' + nowTime +
                '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }
    </script>
    
</body>

</html>
