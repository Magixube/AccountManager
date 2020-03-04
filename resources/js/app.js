require('./bootstrap');

var host = window.location.origin;
        var accounts;
        $.ajax({
            type: "GET",
            url: host+"/accounts",
            dataType: "json",
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                console.log(data);
                accounts = data;
                data.forEach(function(row, index) {
                    console.log(row);
                    var html = '<tr><th><input type="checkbox" id="id'+ row.id +'" name="id' + row.id + '" value="'+ row.id +'"></th><td>' +
                    row.account + "</td><td>" +
                    row.name + "</td><td>" +
                    (row.sex == "1"? '男':'女') + "</td><td>" +
                     row.birthday + "</td><td>" +
                     row.email + "</td><td>" +
                     row.remark + "</td><td>"+
                     '<button class="btn btn-success edit-account"  data-index="'+ index + '">編輯</button></td></tr>';
                     $("#accountTable tbody").append(html);
                });
            }
        });
        $(document).on("click", ".edit-account", function (e) {
            e.preventDefault();
            var index = $(this).data('index');
            console.log(accounts);
            $("#editId").val(accounts[index].id);
            $("#editAccount").val(accounts[index].account);
            $("#editName").val(accounts[index].name);
            $("#editSex").val(accounts[index].sex);
            $("#editBirthday").val(accounts[index].birthday);
            $("#editEmail").val(accounts[index].email);
            $("#editRemark").val(accounts[index].remark);
            $("#editAccountModal").modal('show');
        });

        $.validator.addMethod("alphanumeric", function (value, element) {
            return this.optional(element) || value == value.match(/^[a-z0-9A-Z]+$/);
        }, "只能輸入英文和數字");

        $('#delete').submit(function(e) {
            if(!confirm('確定刪除?')) {
                e.preventDefault();
            }
        })

        $().ready(function() {

            $("#new").validate({
                submitHandler: function (form) {
                    if(confirm('確定新增?'))
                        form.submit();
                },
                rules: {
                    newAccount: {
                        required: true,
                        alphanumeric: true
                    },
                    newName: "required",
                    newSex: "required",
                    newBirthday: {
                        required: true,
                        date: true
                    },
                    newEmail: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    newAccount: {
                        required: "請輸入帳號",
                        alphanumeric: "只接受英文字母和數字"
                    },
                    newName: "請輸入名字",
                    newSex: "請輸入性別",
                    newBirthday: "請輸入生日",
                    newEmail: {
                        required: "請輸入信箱",
                        email: "信箱的格式不正確"
                    }
                }
            });
            $("#edit").validate({
                submitHandler: function (form) {
                    if(confirm('確定編輯?'))
                        form.submit();
                },
                rules: {
                    editAccount: {
                        required: true,
                        alphanumeric: true
                    },
                    editName: "required",
                    editSex: "required",
                    editBirthday: {
                        required: true,
                        date: true
                    },
                    editEmail: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    editAccount: {
                        required: "請輸入帳號",
                        alphanumeric: "只接受英文字母和數字"
                    },
                    editName: "請輸入名字",
                    editSex: "請輸入性別",
                    editBirthday: "請輸入生日",
                    editEmail: {
                        required: "請輸入信箱",
                        email: "信箱的格式不正確"
                    }
                }
            });
        });