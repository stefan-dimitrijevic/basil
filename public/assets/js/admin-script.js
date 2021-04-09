$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#image').on('change', function () {
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })

    let parts = window.location.href.split('/')
    let fourthSegment = parts[4];
    let lastSegment = parts.pop();
    let ingredients = [];
    let quantity = [];
    let directions = [];
    if (fourthSegment == 'recipes' && lastSegment == 'edit') {
        ingredients = $.parseJSON($('#ingredients').val());
        quantity = $.parseJSON($('#quantity').val());
        directions = $.parseJSON($('#directions').val());
    }

    $(document).on('click', '#logout', function (e) {
        e.preventDefault();
        document.getElementById('logout-form').submit();
    })

    $(document).on('blur', '.input-ingredient', function () {
        if ($(this).val() != '') {
            ingredients[$(this).data('id')] = $(this).val();
            console.log(ingredients);

        }

        if ($('#ingredient-' + $(this).data('id')).val() != '' && $('#quantity-' + $(this).data('id')).val() != '') {
            $('#remove-' + $(this).data('id')).show();
        }
    })

    $(document).on('blur', '.input-quantity', function () {
        if ($(this).val() != '') {
            quantity[$(this).data('id')] = $(this).val();
            console.log(quantity);
        }

        if ($('#ingredient-' + $(this).data('id')).val() != '' && $('#quantity-' + $(this).data('id')).val() != '') {
            $('#remove-' + $(this).data('id')).show();
        }
    })

    $(document).on('click', '#add-ingredient', function () {
        if (ingredients.length == quantity.length) {
            let rows = renderRows(ingredients, quantity);

            rows += `<tr id="ingredient-row-${ingredients.length}">
                    <td>
                        <div class="form-group mb-0">
                            <input type="text" class="form-control input-ingredient" data-id="${ingredients.length}" id="ingredient-${ingredients.length}" value="">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input type="text" class="form-control input-quantity" data-id="${ingredients.length}" id="quantity-${ingredients.length}" value="">
                        </div>
                    </td>
                    <td class="text-right">
                        <button type="button" rel="tooltip"
                                class="btn btn-danger btn-sm btn-icon btn-remove-ingredient"
                                id="remove-${ingredients.length}" data-id="${ingredients.length}">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                    </td>
                </tr>
<tr><td> <button type="button" class="btn btn-success" id="add-ingredient">Add Ingredient
                                            </button></td></tr>`
            $('#content').html(rows);
        }
    })

    $(document).on('click', '.btn-remove-ingredient', function () {
        let id = $(this).data('id');
        ingredients.splice(id, 1);
        quantity.splice(id, 1);
        console.log(ingredients, quantity);
        if (ingredients.length == quantity.length) {
            let rows = renderRows(ingredients, quantity);

            rows += `<tr><td> <button type="button" class="btn btn-success" id="add-ingredient">Add Ingredient
            </button></td></tr>`
            $('#content').html(rows);
        }

    })


    $(document).on('blur', '.input-direction', function () {
        if ($(this).val() != '') {
            directions[$(this).data('id')] = $(this).val();
        }

        if ($('#direction-' + $(this).data('id')).val() != '') {
            $('#remove-direction-' + $(this).data('id')).show();
        }
        console.log(directions)
    })

    $(document).on('click', '#add-direction', function () {
        let rows = renderDirections(directions);

        if (directions.length >= 0) {
            rows += `<tr id="direction-row-${directions.length}">
                        <td>
                            <div class="form-group mb-0">
                                <label for="">Step ${directions.length + 1}: </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group mb-0">
                                <textarea class="form-control input-direction" data-id="${directions.length}" id="direction-${directions.length}" rows="10"></textarea>
                            </div>
                        </td>
                        <td class="text-right">
                            <button type="button" rel="tooltip"
                                    class="btn btn-danger btn-sm btn-icon btn-remove-direction"
                                    id="remove-direction-${directions.length}" data-id="${directions.length}">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                        </td>
                    </tr>

<tr><td> <button type="button" class="btn btn-success" id="add-direction">Add Step
                                            </button></td></tr>`
            $('#content-directions').html(rows);
        }
    })

    $(document).on('click', '.btn-remove-direction', function () {
        let id = $(this).data('id');
        directions.splice(id, 1);
        console.log(directions);
        if (directions.length >= 0) {
            let rows = renderDirections(directions);

            rows += `<tr><td> <button type="button" class="btn btn-success" id="add-direction">Add Step
            </button></td></tr>`
            $('#content-directions').html(rows);
        }

    })


    $(document).on('click', '#add-recipe', function () {
        console.log(ingredients);
        let name = $('#name').val();
        let image = $('#image').val();
        let description = $('#description').val();

        let formData = new FormData($('#recipe-form')[0]);
        for (let i = 0; i < ingredients.length; i++) {
            formData.append('ingredients[]', ingredients[i]);
            formData.append('quantity[]', quantity[i]);
        }
        for (let i = 0; i < directions.length; i++) {
            formData.append('directions[]', directions[i]);
        }

        if (!validateFieldsForRecipeInsert(name, image, description, ingredients, quantity, directions)) {
            swalNotValidated();
        } else {
            $.ajax({
                url: '/admin/recipes',
                method: 'post',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.errors) {
                        render(data.errors);
                    } else {
                        // console.log(data)
                        swalSuccess('You added a new recipe!');
                    }
                },
                error: function () {
                    swalError();
                }
            })
        }
    })
    $(document).on('click', '#update-recipe', function () {
        let id = $('#id').val();
        let name = $('#name').val();
        let description = $('#description').val();

        let formData = new FormData($('#recipe-form')[0]);
        for (let i = 0; i < ingredients.length; i++) {
            formData.append('ingredients[]', ingredients[i]);
            formData.append('quantity[]', quantity[i]);
        }
        for (let i = 0; i < directions.length; i++) {
            formData.append('directions[]', directions[i]);
        }

        if (!validateFieldsForRecipeUpdate(name, description, ingredients, quantity, directions)) {
            swalNotValidated();
        } else {
            $.ajax({
                url: `/admin/recipes/${id}`,
                method: 'post',
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    swalSuccessUpdate('Recipe was successfully updated!');
                },
                error: function () {
                    swalError();
                }
            })
        }
    })
    $(document).on('click', '.btn-delete-recipe', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/recipes/${id}`,
                    method: 'delete',
                    success: function (data) {
                        console.log(data);
                        swallDeleteSuccess('Recipe has been deleted.', id)
                    }
                })
            }
        })
    })

    $(document).on('click', '#add-user', function () {
        let name = $('#name').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let role = $("input[name='role']:checked").val();

        if (!validateFieldsForUserInsert(name, email, password)) {
            swalNotValidated();
        } else {
            $.ajax({
                url: '/admin/users',
                method: 'post',
                dataType: 'json',
                data: {
                    'name': name,
                    'email': email,
                    'password': password,
                    'role': role
                },
                success: function (data) {
                    if (data.errors) {
                        render(data.errors);
                    } else {
                        swalSuccessUser('You added a new user!');
                    }
                },
                error: function () {
                    swalError();
                }
            })
        }
    })
    $(document).on('click', '#update-user', function () {
        let id = $('#id').val();
        let role = $("input[name='role']:checked").val();

        $.ajax({
            url: `/admin/users/${id}`,
            method: 'put',
            dataType: 'json',
            data: {
                'role': role
            },
            success: function (data) {
                console.log(data);
                swalSuccessUserUpdate('User was successfully updated!');
            },
            error: function () {
                swalError();
            }
        })
    })
    $(document).on('click', '.btn-delete-user', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/users/${id}`,
                    method: 'delete',
                    success: function (data) {
                        swallDeleteSuccess('User has been deleted.', id)
                    }
                })
            }
        })
    })


})

function renderRows(ingredients, quantity) {
    let rows = ''
    for (let i = 0; i < ingredients.length; i++) {
        rows += `<tr id="ingredient-row-${i}">
                    <td>
                        <div class="form-group mb-0">
                            <input type="text" class="form-control input-ingredient" data-id="${i}" id="ingredient-${i}" value="${ingredients[i]}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <input type="text" class="form-control input-quantity" data-id="${i}" id="quantity-${i}" value="${quantity[i]}">
                        </div>
                    </td>
                    <td class="text-right">
                        <button type="button" rel="tooltip"
                                class="btn btn-danger btn-sm btn-icon btn-remove-ingredient"
                                id="remove-${i}" data-id="${i}" style="display: inline">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                    </td>
                </tr>
`

    }
    return rows;
}

function renderDirections(directions) {
    let rows = ''
    for (let i = 0; i < directions.length; i++) {
        rows += `<tr id="direction-row-${i}">
                    <td>
                        <div class="form-group mb-0">
                            <label for="">Step ${i + 1}: </label>
                        </div>
                    </td>
                    <td>
                        <div class="form-group mb-0">
                            <textarea class="form-control input-direction" data-id="${i}" id="direction-${i}" rows="10">${directions[i]}</textarea>
                        </div>
                    </td>
                    <td class="text-right">
                        <button type="button" rel="tooltip"
                                class="btn btn-danger btn-sm btn-icon btn-remove-direction"
                                id="remove-direction-${i}" data-id="${i}" style="display: inline">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                    </td>
                </tr>
`
    }
    return rows;
}


function validateFieldsForRecipeInsert(name, image, description, ingredients, quantity, directions) {
    let errors = [];

    if (ingredients.length == 0) {
        errors.push('You must have minimum one ingredient with quantity')
    }

    if (quantity.length == 0) {
        errors.push('You must have minimum one ingredient with quantity')
    }

    if (directions.length == 0) {
        errors.push('You must have minimum one step.')
    }

    if (name == '') {
        errors.push('Name is required')
    }

    if (image == '') {
        errors.push('Image is required')
    }

    if (description == '') {
        errors.push('Description is required')
    }

    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}

function validateFieldsForRecipeUpdate(name, description, ingredients, quantity, directions) {
    let errors = [];

    if (name == '') {
        errors.push('Name is required')
    }

    if (description == '') {
        errors.push('Description is required')
    }

    if (ingredients.length == 0) {
        errors.push('You must have minimum one ingredient with quantity')
    }

    if (quantity.length == 0) {
        errors.push('You must have minimum one ingredient with quantity')
    }

    if (directions.length == 0) {
        errors.push('You must have minimum one step.')
    }

    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}

function validateFieldsForUserInsert(name, email, password) {
    let errors = [];

    if (name == '') {
        errors.push('Name is required')
    }

    if (email == '') {
        errors.push('Description is required')
    }

    if (password == '') {
        errors.push('Directions are required')
    }

    if (errors.length > 0) {
        return false;
    } else {
        return true;
    }
}

function render(errors) {
    let html = '';
    for (let error of errors) {
        html += `<p>${error}</p>`
    }
    $('.errors').html(html);
    $('.error-card').show();
}


function swalNotValidated() {
    Swal.fire({
        icon: 'error',
        title: 'Ooops!',
        text: 'Please, fill in all fields',
        focusConfirm: true,
    })
}

function swalSuccess(text) {
    Swal.fire({
        icon: 'success',
        title: 'Good job!',
        text: text,
        focusConfirm: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = '../recipes'
        }
    })
}

function swalSuccessUpdate(text) {
    Swal.fire({
        icon: 'success',
        title: 'Good job!',
        text: text,
        focusConfirm: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = '../../recipes'
        }
    })
}

function swalError() {
    Swal.fire({
        icon: 'error',
        title: 'Ooops!',
        text: 'There was a problem! Try again.',
        focusConfirm: true,
    })
}

function swallDeleteSuccess(text, id) {
    Swal.fire({
        icon: 'success',
        title: 'Good job!',
        text: text,
        focusConfirm: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $(`#table-row-${id}`).remove();
        }
    })
}

function swalSuccessUser(text) {
    Swal.fire({
        icon: 'success',
        title: 'Good job!',
        text: text,
        focusConfirm: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = '../'
        }
    })
}


function swalSuccessUserUpdate(text) {
    Swal.fire({
        icon: 'success',
        title: 'Good job!',
        text: text,
        focusConfirm: true,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = '../../users'
        }
    })
}



