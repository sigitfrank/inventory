<script>
document.addEventListener('DOMContentLoaded', function(event) {
    $('#users-management-table').DataTable({
        "bInfo": false,
    })

    function callAlert(icon, title, message){
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        }).then(function(){
            return location.reload();
        })
    }
    
    function toggleUserManagement({idUser, idModule}) {
        $.ajax({
            url:`/users/${idUser}/toggle`,
            type:'put',
            data:{
                _token:$('meta[name=csrf-token]').attr("content"),
                idModule:idModule
            },
            success:function(response){
                const data = JSON.parse(response)
                const {status, message} = data
                status ? callAlert('success', 'User Access', message) : callAlert('error', 'User Access', message)
            }
        })
    }

    const checkboxsUserManagement = Array.from(document.querySelectorAll('.checkbox_user_management'));
    checkboxsUserManagement.map((checkbox)=>{
        checkbox.addEventListener('click', function (event) {
            event.preventDefault()
            const idUser = this.dataset.iduser
            const idModule = this.dataset.idmodule
            toggleUserManagement({idUser, idModule})
        })
    })
    
})
</script>