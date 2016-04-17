function setUpdateAction() {
document.frmUser.action = "admin_edituser.php";
document.frmUser.submit();
}
function setDeleteAction() {
if(confirm("Are you sure want to delete these rows?")) {
document.frmUser.action = "admin_deleteuser.php";
document.frmUser.submit();
}
}

function setDelete2Action() {
if(confirm("Are you sure want to delete these rows?")) {
document.frmUser.action = "SupplyDelete.php";
document.frmUser.submit();
}
}
function setUpdate2Action() {
document.frmUser.action = "SupplyUpdateUser.php";
document.frmUser.submit();
}

function EnableDisAble(){
if (document.getElementById("chkAgree").checked == true)
document.getElementById("btnSubmit").disabled = false;
else
document.getElementById("btnSubmit").disabled = true;
}