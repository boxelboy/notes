
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$(document).ready(function () {
    $('#loginbutton').click(function() {
        let form = $('#loginbutton').closest($('#loginModal'))
        let name = form.find('#name').val()
        let password = form.find('#password').val()
        $('#loginbutton').find('i').removeClass('fa-angle-double-right').addClass('fa-spinner fa-spin')

        $.ajax({
            url: '/login',
            data: {name: name, password: password},
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.status) {
                    Cookies.set('user', 1)
                    window.location.href = '/'
                } else {
                    $('#loginbutton').find('i').removeClass('fa-spinner fa-spin').addClass('fa-angle-double-right')
                    form.find('.alert').removeClass('d-none')
                }

            },
            error: function(data) {
                console.log('error', data)
            }
        })

    })

    $('.view').click(function() {
        $('.notes').each(function() {
            $(this).css('display', 'none')
        })
        let id = $(this).data('id')
        $('.note-' + id).css('display', 'block')
    })

    $('.newNote').click(function() {
        window.location.href = '/newnote'
    })


    $('.edit').click(function() {
        let id = $(this).data('id')
        window.location.href = '/edit/' + id
    })

    $('.note-cancel').click(function() {
        window.location.href = '/'
    })

    $('#logout').click(function() {
        Cookies.remove('user')
        window.location.href = '/logout'
    })

    $('.delete').click(function() {
        console.log($(this))
        let id = $(this).data('id')

        $.ajax({
            url: '/delete/' + id,
            type: 'DELETE',
            success: function(result) {
                if (result == 204) {
                    window.location.href = '/'
                }
            },
            error: function(error) {
                console.log('oh dear')
                console.log(error)
            }
        })
    })

    $('#changebutton').click(function() {
        let form = $('#changebutton').closest($('.card-body'))
        let title = form.find('#title').val()
        let note = form.find('#note').val()
        let display = form.find('#private').val()
        let id = form.find('#id').val()
        $('#changebutton').find('i').removeClass('fa-angle-double-right').addClass('fa-spinner fa-spin')

        $.ajax({
            url: '/edit',
            data: {id: id, title: title, note: note, private: display,},
            type: 'POST',
            dataType: 'json',
            success: function(result) {
                if (result == 200) {
                    window.location.href = '/'
                } else {
                    $('#loginbutton').find('i').removeClass('fa-spinner fa-spin').addClass('fa-angle-double-right')
                    form.find('.alert').removeClass('d-none')
                }
            },
            error: function(data) {
                console.log('error', data)
            }
        })
    })


});
