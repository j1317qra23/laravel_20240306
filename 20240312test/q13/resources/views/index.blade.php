<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    
    <!-- 引入 jQuery 和 DataTables 的 CSS 和 JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    
    {{-- Blade 模板中添加全域 JavaScript 變數 --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    <style>
        .container {
            text-align: center;
        }

        #fetchDataBtn {
            float: middle;
        }
        #parseBtn {
            float: left;  /* 讓 Parse 按鈕浮動在左邊 */
        }
        #userInfo {
            margin-top: 20px;
        }
        .red {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>用戶列表</h3>
        <div id="userInfo"></div>  
        <button id="fetchDataBtn">Fetch</button>
        <button id="parseBtn">Parse</button>
        <table id="myTable" class="table table-striped table-bordered" style="display:none;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Company</th>
                    <th>Detail</th> 
                    <th>Action</th>
                </tr>
            </thead>
        </table>
       
    </div>

    <script>
    let tableData;
    $(document).ready(function () {
        $('#fetchDataBtn').on('click', function () {
            let url = 'https://jsonplaceholder.typicode.com/users';
            $.ajax({
                url: url,
                method: 'GET',
                success: function (data) {
                    if ($.fn.DataTable.isDataTable('#myTable')) {
                        $('#myTable').DataTable().destroy();
                    }
                    $('#myTable').DataTable({
                        data: data,
                        columns: [
                            { data: 'id' },
                            { data: 'name' },
                            { data: 'username' },
                            { data: 'email' },
                            {
                                data: null,
                                render: function (data, type, row) {
                                    let addressString = `${row.address.street}, ${row.address.suite}, ${row.address.city}, ${row.address.zipcode} (${row.address.geo.lat}, ${row.address.geo.lng})`;
                                    return addressString;
                                }
                            },
                            {
                                data: 'phone',
                                render: function (data, type, row) {
                                    return data.startsWith('1') ? `<span class="">${data}</span>` : data;
                                }
                            },
                            { data: 'website' },
                            {
                                data: null,
                                render: function (data, type, row) {
                                    let companyString = `${row.company.name} - ${row.company.catchPhrase} (${row.company.bs})`;
                                    return companyString;
                                }
                            },
                            {
                                data: null,
                                render: function (data, type, row) {
                                    return '<button class="detailBtn">Detail</button>';
                                }
                            },
                            {
                                data: null,
                                render: function (data, type, row) {
                                    return '<button class="deleteBtn">Delete</button>';
                                }
                            },
                        ],
                        order: [[0, 'desc']]
                    });
                    $('#myTable').show();
                    tableData = data;
                    setupDetailBtnListener();
                    setupDeleteBtnListener();
                },
                error: function () {
                    console.log('Failed to fetch data.');
                }
            });
        });

        $('#parseBtn').on('click', function () {
            let url = '/parse-data';
            $.ajax({
                url: url,
                method: 'POST',
                data: JSON.stringify(tableData),
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (parsedData) {
                    $('#myTable').DataTable().clear().rows.add(parsedData).draw();
                },
                error: function () {
                    console.log('Failed to parse data.');
                }
            });
        });

        function setupDetailBtnListener() {
            $('#myTable tbody').on('click', '.detailBtn', function () {
                let row = $(this).closest('tr');
                let rowData = $('#myTable').DataTable().row(row).data();
                $('#userInfo').html(`
                    <p>ID: ${rowData.id}</p>
                    <p>Name: ${rowData.name}</p>
                    <p>Username: ${rowData.username}</p>
                    <p>Email: ${rowData.email}</p>
                    <p>Address: ${rowData.address.street}, ${rowData.address.suite}, ${rowData.address.city}, ${rowData.address.zipcode} (${rowData.address.geo.lat}, ${rowData.address.geo.lng})</p>
                    <p>Phone: ${rowData.phone}</p>
                    <p>Website: ${rowData.website}</p>
                    <p>Company: ${rowData.company.name} - ${rowData.company.catchPhrase} (${rowData.company.bs})</p>
                `);
                if (rowData.phone.startsWith('1')) {
            $('#userInfo p:nth-child(6)').addClass('red'); 
                } else {
                    $('#userInfo p:nth-child(6)').removeClass('red'); 
                }
                    });
                }

        function setupDeleteBtnListener() {
            $('#myTable tbody').on('click', '.deleteBtn', function () {
                let row = $(this).closest('tr');
                let rowData = $('#myTable').DataTable().row(row).data();
                console.log('Delete button clicked for ID:', rowData.id);
                $('#myTable').DataTable().row(row).remove().draw();
            });
        }
    });
    </script>
</body>
</html>
