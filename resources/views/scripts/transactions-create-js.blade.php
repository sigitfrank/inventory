<script>

    const productName = document.querySelector('#product_name')

    function getUnit(data){
        const productId = data[0]
        const productName = data[1]
        const userId = data[2]
        $.ajax({
            url: `/products/unit`,
            "type": 'POST',
            data:{
                _token:$('meta[name=csrf-token]').attr("content"),
                productName:productName,
                userId:userId
            },
            success:function(response){
                const getRepsonse =  JSON.parse(response)
                const {unit} = getRepsonse.unit
                const units = unit.split(',')
                console.log(units);
                const unitSpan = document.querySelector("#unit")
                const unitContainer = document.querySelector("#unit_container")
                if(units.length > 1){
                    unitContainer.firstElementChild.nextElementSibling.remove()
                    let selectOption = `<select class="form-control" name="unit">`
                    units.map((unit)=>{
                        selectOption += `<option value="${unit}">${unit}</option>`
                    })
                    selectOption += `</select>`
                    unitContainer.insertAdjacentHTML('beforeend', selectOption)
                } else{
                    unitContainer.firstElementChild.nextElementSibling.remove()
                    const unitInput = `<input type="text" class="form-control" id="unit" name="unit" placeholder="unit..." value="${units[0]}">`
                    unitContainer.insertAdjacentHTML('beforeend', unitInput)
                }
            }
        })
    }

    productName.addEventListener('change', function(){
        const data = this.value.split('-')
        getUnit(data)
    })

</script>