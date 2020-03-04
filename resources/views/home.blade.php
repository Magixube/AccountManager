@extends ('layout')

@section ('content')

<div class="container">

    <form id="delete" method="POST" action=/accounts>
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newAccountModal">新增</button>
        <button id="delete" class="btn btn-danger float-right">刪除選擇項目</button>
        <table id="accountTable" class="table">
            <thead>
                <th scope="col">#</th>
                <th scope="col">帳號</th>
                <th scope="col">姓名</th>
                <th scope="col">性別</th>
                <th scope="col">生日</th>
                <th scope="col">信箱</th>
                <th scope="col">備註</th>
                <th scope="col">編輯</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </form>


    <div class="modal fade" id="newAccountModal" tabindex="-1" role="dialog" aria-labelledby="newAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newAccountModalLabel">新增帳號</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="new" method="POST" action="/accounts">
                        @csrf
                        <div class="form-group">
                            <label for="newAccount">帳號</label>
                            <input type="text" class="form-control" id="newAccount" name="newAccount" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="newName">姓名</label>
                            <input type="text" class="form-control" id="newName" name="newName" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="newSex">性別</label>
                            <select class="form-control" id="newSex" name="newSex" required>
                                <option value="1">男</option>
                                <option value="0">女</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="newBirthday">生日</label>
                            <input type="date" class="form-control" id="newBirthday" name="newBirthday" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="newEmail">信箱</label>
                            <input type="email" class="form-control" id="newEmail" name="newEmail" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="newRemark">備註</label>
                            <input type="text" class="form-control" id="newRemark" name="newRemark" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button id="newSubmit" type="submit" form="new" class="btn btn-primary">新增</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAccountModalLabel">編輯帳號</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit" method="POST" action="/accounts">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editId" name="editId" value="">
                    <div class="form-group">
                        <label for="editAccount">帳號</label>
                        <input type="text" class="form-control" id="editAccount" name="editAccount" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="editName">姓名</label>
                        <input type="text" class="form-control" id="editName" name="editName" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="editSex">性別</label>
                        <select class="form-control" id="editSex" name="editSex">
                            <option value="1">男</option>
                            <option value="0">女</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editBirthday">生日</label>
                        <input type="date" class="form-control" id="editBirthday" name="editBirthday" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">信箱</label>
                        <input type="email" class="form-control" id="editEmail" name="editEmail" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="editRemark">備註</label>
                        <input type="text" class="form-control" id="editRemark" name="editRemark" value="" >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button id="editSubmit" type="submit" form="edit" class="btn btn-primary">編輯</button>
            </div>
        </div>
    </div>
    </div>

</div>

@endsection
