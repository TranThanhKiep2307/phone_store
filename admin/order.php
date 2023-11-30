<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách đơn hàng</h2>
        <div class="block sloginblock">
            <form>
                <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>brand Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="odd gradeX">
                            <td></td>
                            <td></td>
                            <td><a href="">Edit</a> ||
                                <a onclick="return confirm ('Bạn có chắc muốn xóa không???')" href="">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>