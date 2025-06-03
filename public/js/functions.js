
window.addEventListener('load', function () {

    if (document.getElementById('edit')) {
        document.getElementById('edit').disabled = true;
    }

    if (document.getElementsByClassName('alert alert-success')[0]) {
        setTimeout(hide, 3000)
    }
    if (document.getElementById('company')) {
        document.getElementById('company').addEventListener("change", () => {
            var select = document.getElementById('company').value;
            fetch(`${window.location.origin}/company/${select}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('branch').innerText = null;
                    for (let i = 0; i < data.branch.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = data.branch[i].id;
                        opt.innerHTML = data.branch[i].branch_name;
                        document.getElementById('branch').appendChild(opt);
                    }
                });
        })
    }
    if (document.getElementById('vcat')) {
        document.getElementById('vcat').addEventListener("change", () => {
            var select = document.getElementById('vcat').value;
            fetch(`${window.location.origin}/getvehicledetalis/${select}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('vmanu').innerText = null;
                    for (let i = 0; i < data.manufacturer.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = data.manufacturer[i].id;
                        opt.innerHTML = data.manufacturer[i].manufacturer_name;
                        document.getElementById('vmanu').appendChild(opt);
                    }
                });
        })
    }

   
})

function editcompany(id) {
    fetch(`${window.location.origin}/company/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit').disabled = false;
            document.getElementById('name').value = data.Company_name
            document.getElementById('short_name').value = data.shot_name
            document.getElementById("form_id").action = `${window.location.origin}/company/${id}`;
        });
}

function editbranch(id) {
 
        fetch(`${window.location.origin}/branch/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit').disabled = false;
            document.getElementById('short_name').value = data.branch_name
            document.getElementById("form_id").action = `${window.location.origin}/branch/${id}`;
        });  

   
}
function editmanufacturer(id) {
    fetch(`${window.location.origin}/manufacturer/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit').disabled = false;
            document.getElementById('short_name').value = data.manufacturer_name
            document.getElementById("form_id").action = `${window.location.origin}/manufacturer/${id}`;
        });
}
function edituser(id) {
    fetch(`${window.location.origin}/userdetails/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit').disabled = false;
            document.getElementById('short_name').value = data.name
            document.getElementById('email').value = data.email
            document.getElementById("form_id").action = `${window.location.origin}/edituserdetails/${id}`;
        });
}

function editfo(id) {
    fetch(`${window.location.origin}/fo/${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit').disabled = false;
            document.getElementById('short_name').value = data.name
            document.getElementById('email').value = data.email
            document.getElementById('mobile').value = data.mobile
            document.getElementById("form_id").action = `${window.location.origin}/fo/${id}`;
        });
}
var imgremane = [];
function saveimgname() {
    $("select").each(function () {
        if (!$(this).val().length) {
            var i = $(this);
            $(this).css('border-color', 'red');

            $("html, body").animate({
                scrollTop: $(this).offset().top
            }, 100);
            setTimeout(function () {
                $(i).css('border', '1px solid #ced4da');
            }, 4000)
        } else {
            const token = $("input[name='_token']").val();
            const form = new FormData();
            form.append('value', JSON.stringify(imgremane))
            fetch(`${window.location.origin}/rename`, {
                method: 'POST',
                body: form,
                headers: {
                    "X-CSRF-Token": token
                },
            })
                .then(function (res) {
                    return res.json();
                })
                .then(function (response) {

                    if (response.success) {
                        window.location.href = response.url;
                    }
                })
            return false;
        }
    });

}

function set(name, file) {
    const found = imgremane.find(elem => elem.file == file.dataset.id);
    if (found) {
        imgremane = imgremane.filter(item1 => item1 !== found)
    }
    imgremane.push({ name: name.value.replaceAll(/\s/g, ''), file: file.dataset.id, path: file.dataset.path, params: file.dataset.param });
}
function hide() {
    document.getElementsByClassName('alert alert-success')[0].style.display = "none";
}
function change(id){
if(id==3){
    $("#ro").show()
}
if(id==2){
    $("#ro").hide()
}
}
function date(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
    var yyyy = today.getFullYear();
    if(dd<10){
      dd='0'+dd
    } 
    if(mm<10){
      mm='0'+mm
    } 
    
    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("datefield").setAttribute("min", today);
}
function ctypechanged(id){
    if(id==1){
        $("#valuation").hide()
        $("#valuation").find('select, textarea, input').each(function () {
            $(this).attr('disabled', true);
        });
    }
    if(id==2){
        $('#exampleModalToggle').modal('show');
        $("#valuation").show();
        $("#valuation").find('select, textarea, input').each(function () {
            $(this).attr('disabled', false);
        });
  
    }
}
function check(){
    $("input, select, textarea").each(function () {
        if (!$(this).val().length) {
            var i = $(this);
            $(this).css('border-color', 'red');

            $(this).focus();
            setTimeout(function () {
                $(i).css('border', '1px solid #ced4da');
            }, 5000)
        } else {
           
            
        }
    })
}
var i= 0;
function changecompanyandbranch(id){
    if(i==0){
        fetch(`${window.location.origin}/company/${document.getElementById('company').value}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit').disabled = false;
            document.getElementById('branch').innerText = null;
            for (let i = 0; i < data.branch.length; i++) {
                var opt = document.createElement('option');
                opt.value = data.branch[i].id;
                opt.innerHTML = data.branch[i].branch_name;
                document.getElementById('branch').appendChild(opt);
            }
            document.getElementById("form_id").action = `${window.location.origin}/changecompany/${document.getElementById('company').value}`;
        });  
        i++
    }else{  document.getElementById("form_id").action = `${window.location.origin}/changecompany/${id}`;}
  

}
var j=0;
function changevehicletype (id){
    if(j==0){ 
        fetch(`${window.location.origin}/getvehicledetalis/${document.getElementById('vcat').value}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('vmanu').innerText = null;
            for (let i = 0; i < data.manufacturer.length; i++) {
                var opt = document.createElement('option');
                opt.value = data.manufacturer[i].id;
                opt.innerHTML = data.manufacturer[i].manufacturer_name;
                document.getElementById('vmanu').appendChild(opt);
            }
            document.getElementById("form_id1").action = `${window.location.origin}/changevcat/${document.getElementById('company').value}`;
        });
        j++
    }else{  
        document.getElementById("form_id1").action = `${window.location.origin}/changevcat/${id}`;

    }
}