const cep = document.getElementById("cep");

cep.addEventListener('blur',function () {
    var cep = this.value.replace(/[^0-9]/, "");

    if (cep.length !== 8) {
        document.getElementById('cep-error').removeAttribute('hidden');
        document.getElementById('state').value = '';
        document.getElementById('city').value = '';
        document.getElementById('district').value = '';
        document.getElementById('address_street').value = '';
    }

    var url = "https://viacep.com.br/ws/" + cep + "/json/"

    $.getJSON(url, function (data) {

        console.log(data.hasOwnProperty('erro'))
        if (!data.hasOwnProperty('erro')){
            document.getElementById('cep-error').setAttribute('hidden', 'true');
            document.getElementById('state').value = data.uf;
            document.getElementById('city').value = data.localidade;
            document.getElementById('district').value = data.bairro;
            document.getElementById('address_street').value = data.logradouro;
            return;
        }

        document.getElementById('state').value = '';
        document.getElementById('city').value = '';
        document.getElementById('district').value = '';
        document.getElementById('address_street').value = '';
        document.getElementById('cep-error').removeAttribute('hidden');
    })
})

function customPrintable(name) {
    const realName = document.title;
    window.onbeforeprint = function (e) {
        document.title = name;
        document.getElementsByClassName("mobile-nav-toggle")[0].classList.add("noPrint");
    }
    window.onafterprint = function (e){
        document.title = realName;
        document.getElementsByClassName("mobile-nav-toggle")[0].classList.remove("noPrint");

    }
    window.print();
}

function editToggle(modalId){

    let inputs = document.querySelectorAll(
        `div#modal${modalId} > div.modal-dialog > div.modal-content > div.modal-body > label `
    );
    let data = document.querySelectorAll(
        `div.data-modal-${modalId}`)
    let btnEditModal = document.querySelector(
        `div#modal${modalId} > div.modal-dialog > div.modal-content > div.modal-footer > button#btnEdit`);
    let btnSaveModal = document.querySelector(
        `div#modal${modalId} > div.modal-dialog > div.modal-content > div.modal-footer > div#saveEditBtn`);
    let btnCloseModal = document.querySelector(
        `div#modal${modalId} > div.modal-dialog > div.modal-content > div.modal-footer > button#btnClose`);
    let btnPrintModal = document.querySelector(
        `div#modal${modalId} > div.modal-dialog > div.modal-content > div.modal-footer > button#btnPrint`);
    let btnDeleteModal = document.querySelector(
        `div#modal${modalId} > div.modal-dialog > div.modal-content > div.modal-footer > form#btnDelete${modalId}`);

    if (!data.item(1).hasAttribute('hidden')){

        btnEditModal.innerText = 'Voltar';

        inputs.forEach(function(input) {
            input.removeAttribute('hidden');
        })

        data.forEach(function (d) {
            d.setAttribute('hidden', 'true');
        });

        btnSaveModal
            .removeAttribute('hidden');
        btnCloseModal
            .setAttribute('hidden', 'true');
        btnPrintModal
            .setAttribute('hidden', 'true');
        btnDeleteModal
            .setAttribute('hidden', 'true');

        return;
    }

    btnEditModal.innerText = 'Editar';


    inputs.forEach(function(input) {
        input.setAttribute('hidden', 'true');
    })

    data.forEach(function (d) {
        d.removeAttribute('hidden');
    });

    btnCloseModal
        .removeAttribute('hidden');
    btnPrintModal
        .removeAttribute('hidden');
    btnDeleteModal
        .removeAttribute('hidden');
    btnSaveModal
        .setAttribute('hidden', 'true');
}

function editRequest(idRequest) {

    let formData = new FormData();
    let inputs = document.querySelectorAll(
        `div#modal${idRequest} > div.modal-dialog > div.modal-content > div.modal-body > label > input,
div#modal${idRequest} > div.modal-dialog > div.modal-content > div.modal-body > label.text-description > textarea`);


    let fieldsRequest = [
        'nome',
        'email',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'cep',
        'descricao'
    ];
    let objData = {
    };

    const token = document.querySelector(
        `div#modal${idRequest} > div.modal-dialog > div.modal-content > div.modal-footer > div#saveEditBtn > input` ).value;

    const url = `/restrito/${idRequest}/editar`

    inputs.forEach(function (input) {
        objData[fieldsRequest[0]] = input.value;
        fieldsRequest.shift();
    })
    fieldsRequest = [
        'nome',
        'email',
        'cidade',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'cep',
        'descricao'
    ];

    objData['_token'] = token

    for (let [key, value] of Object.entries(objData)) {
        formData.append(key, value);
    }

    fetch(url, {
        body: formData,
        method: 'POST',
    }).then(() => {
        editToggle(idRequest);

        while (fieldsRequest.length !== 0){
            if (fieldsRequest[0] === 'rua') {
                document.getElementById(`modal-${fieldsRequest[0]}-${idRequest}`).textContent =
                    `${objData[fieldsRequest.shift()]}, ${objData[fieldsRequest.shift()]} ${objData['complemento'] === '' ? objData[fieldsRequest.shift()] : '- ' + objData[fieldsRequest.shift()]}`;

                document.getElementById(`table-rua-${idRequest}`).textContent =
                    `${objData['rua']}`;
            }

            if (fieldsRequest[0] === 'nome'){
                document.getElementById(`modal-title-${idRequest}`).textContent = objData[fieldsRequest[0]];
            }

            if(document.getElementById(`modal-${fieldsRequest[0]}-${idRequest}`)){
                document.getElementById(`modal-${fieldsRequest[0]}-${idRequest}`).textContent = objData[fieldsRequest[0]];
            }
            if (document.getElementById(`table-${fieldsRequest[0]}-${idRequest}`)){
                document.getElementById(`table-${fieldsRequest[0]}-${idRequest}`).textContent = objData[fieldsRequest[0]];
            }

            fieldsRequest.shift();

        }



        fieldsRequest = [
            'nome',
            'email',
            'cidade',
            'bairro',
            'rua',
            'numero',
            'complemento',
            'cep',
            'descricao'
        ];


    });
}
