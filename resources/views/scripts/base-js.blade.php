<script>
     
  
document.addEventListener('DOMContentLoaded', function(event) {
    // MODAL DELETE
    const spanModalTitle = document.querySelector('#modal_title')
    const spanModalDeleteName = document.querySelector('#s_name_modal_delete')
    const spanModalDeleteId = document.querySelector('#s_id_modal_delete')
    const modalDelete = document.querySelector('#modalDelete')
    const closeModalDelete = document.querySelector('#closeModalDelete')
    const btnDeleteModal = document.querySelector('#btn_delete_modal')
    
    // Declare tableID name based on page, so that in can be used in base js
    const tableID = document.querySelector('table').id

    function toggleModalDelete(modalDelete,display){
        if(display === 'block'){
            modalDelete.style.display = display
            setTimeout(() => {
                modalDelete.classList.add('show') 
            }, 300);
        } else{
            modalDelete.classList.remove('show') 
            setTimeout(() => {
                modalDelete.style.display = display
            }, 300);
        }

    }

    function setContentOnModalDelete(id, name, title){
        spanModalTitle.textContent = title
        spanModalDeleteId.textContent = id
        spanModalDeleteName.textContent = name
    }

    function callAlert({icon, title, message}){
        Swal.fire({
            icon: icon,
            title: title,
            text: message,
        }).then(function(){
            return location.reload();
        })
    }

    function deleteModal(id){
        $.ajax({
            url: `{{Request::segment(1)}}/${id}`,
            "type": 'delete',
            data:{
                _token:$('meta[name=csrf-token]').attr("content"),
            },
            success:function(response){
                console.log(response);
                const getRepsonse =  JSON.parse(response)
                callAlert(getRepsonse)
            }
        })
    }
   
    $(`#${tableID} tbody`).on('click', '.btn_delete_modal', function (event) {
        const modalDeleteId = this.dataset.id
        const modalDeleteTitle = this.dataset.title
        const modalDeleteName = this.dataset.name
        setContentOnModalDelete(modalDeleteId, modalDeleteName, modalDeleteTitle)
        toggleModalDelete(modalDelete, 'block')
    });

    closeModalDelete.addEventListener('click', function(){
        modalDelete.classList.remove('show')
        toggleModalDelete(modalDelete, 'none')
    })

    
    btnDeleteModal.addEventListener('click', function(){
        deleteModal(parseInt(spanModalDeleteId.textContent))
    })
})
</script>