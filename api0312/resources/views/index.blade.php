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
    </style>
</head>
<body>
    <div class="container">
        <h3>用戶列表</h3>
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
                    <th>Action</th> 
                </tr>
            </thead>
        </table>
    </div>

    <script>
     let tableData;// 在 document.ready 外部定義
       $(document).ready(function () {
    $('#fetchDataBtn').on('click', function () {
        let url = 'https://jsonplaceholder.typicode.com/users';

        // 使用 Ajax 載入資料
        $.ajax({
            url: url,
            method: 'GET',
            success: function (data) {
                // 初始化 DataTable 並顯示表格
                $('#myTable').DataTable({
                    data: data,
                    columns: 
                    [
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'username' },
                        { data: 'email' },
                        {data: null,
                        render: function (data, type, row) 
                        {
                            // 將 "address" 和 "geo" 的資訊整合成一個字串
                        let addressString = `${row.address.street}, ${row.address.suite}, ${row.address.city}, ${row.address.zipcode} (${row.address.geo.lat}, ${row.address.geo.lng})`;
                        return addressString;
                        }
                         },
                        { data: 'phone' },
                        { data: 'website' },
                        {
                        data: null,
                        render: function (data, type, row) {
                        // 將 "company" 的資訊整合成一個字串
                        let companyString = `${row.company.name} - ${row.company.catchPhrase} (${row.company.bs})`;
                        return companyString;
                        }
                        },
                        {
                        // 新增 "Delete" 按鈕
                        data: null,
                        render: function (data, type, row) {
                        return '<button class="deleteBtn">Delete</button>';
                        }
                        },
                    ],
                    order: [[0, 'desc']] // 按照 ID 由大到小排序
                });
                // 賦值給 tableData
                tableData = data;
                $('#myTable').show(); // 顯示表格
            },
            error: function () {
                console.log('Failed to fetch data.');
            }
        });
    });

    $('#parseBtn').on('click', function () {
        let url = '/parse-data';

        // 使用 Ajax 請求呼叫 Laravel Controller
        $.ajax({
            url: url,
            method: 'POST',
            data: JSON.stringify(tableData), // 假設 tableData 是你的表格資料
            contentType: 'application/json',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (parsedData) {
                // 將處理後的資料重新套用到 DataTable
                $('#myTable').DataTable().clear().rows.add(parsedData).draw();
            },
            error: function () {
                console.log('Failed to parse data.');
            }
        });
    });

     // 新增 "Delete" 按鈕的事件監聽器
     function setupDeleteBtnListener() {
        $('#myTable tbody').on('click', '.deleteBtn', function () {
            let row = $(this).closest('tr');
            let rowData = $('#myTable').DataTable().row(row).data();

            // 在這裡執行刪除操作，您可以將相應的 API 請求發送到後端
            // 並在成功後更新表格，或直接在前端移除該行，取決於您的需求
            console.log('Delete button clicked for ID:', rowData.id);
            // 以下為前端移除該行的範例
            $('#myTable').DataTable().row(row).remove().draw();
        });
    }
});


    </script>
</body>
</html>
