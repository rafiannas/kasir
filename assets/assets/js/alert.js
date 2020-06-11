//== Class definition
var SweetAlert2Demo = function () {

    //== Demos
    var initDemos = function () {
        //== Sweetalert Demo 1
        $('#alert_demo_1').click(function (e) {
            swal('Good job!', {
                buttons: {
                    confirm: {
                        className: 'btn btn-success'
                    }
                },
            });
        });

        //== Sweetalert Demo 2
        $('#alert_demo_2').click(function (e) {
            swal("Here's the title!", "...and here's the text!", {
                buttons: {
                    confirm: {
                        className: 'btn btn-success'
                    }
                },
            });
        });

        //== Sweetalert Demo 3
        $('#alert_demo_3_1').click(function (e) {
            swal("Good job!", "You clicked the button!", {
                icon: "warning",
                buttons: {
                    confirm: {
                        className: 'btn btn-warning'
                    }
                },
            });
        });

        $('#alert_demo_3_2').click(function (e) {
            swal("Good job!", "You clicked the button!", {
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-danger'
                    }
                },
            });
        });

        $('#alert_demo_3_3').click(function (e) {
            swal("Good job!", "You clicked the button!", {
                icon: "success",
                buttons: {
                    confirm: {
                        className: 'btn btn-success'
                    }
                },
            });
        });

        $('#alert_demo_3_4').click(function (e) {
            swal("Good job!", "You clicked the button!", {
                icon: "info",
                buttons: {
                    confirm: {
                        className: 'btn btn-info'
                    }
                },
            });
        });

        //== Sweetalert Demo 4
        $('#alert_demo_4').click(function (e) {
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                icon: "success",
                buttons: {
                    confirm: {
                        text: "Confirm Me",
                        value: true,
                        visible: true,
                        className: "btn btn-success",
                        closeModal: true
                    }
                }
            });
        });

        $('#alert_demo_5').click(function (e) {
            swal({
                title: 'Input Something',
                html: '<br><input class="form-control" placeholder="Input Something" id="input-field">',
                content: {
                    element: "input",
                    attributes: {
                        placeholder: "Input Something",
                        type: "text",
                        id: "input-field",
                        className: "form-control"
                    },
                },
                buttons: {
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        className: 'btn btn-success'
                    }
                },
            }).then(
                function () {
                    swal("", "You entered : " + $('#input-field').val(), "success");
                }
            );
        });

        $('#alert_demo_6').click(function (e) {
            swal("This modal will disappear soon!", {
                buttons: false,
                timer: 3000,
            });
        });

        $('#alert_demo_7').click(function (e) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Yes, delete it!',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    swal({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        type: 'success',
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    });
                } else {
                    swal.close();
                }
            });
        });
        $('.tombol-hapus').on('click', function (e) {
            e.preventDevault();
            const href = $(this).attr('href');
            swal({
                title: 'Toko akan dihapus?',
                text: "Data toko dan atributnya akan dihapus secara permanen!",
                type: 'warning',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'Tidak, Batal!',
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        text: 'Ya, Hapus Toko!',
                        className: 'btn btn-success'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    document.location.href = href;
                } else {
                    swal("Data toko tetap tersedia!", {
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        }
                    });
                }
            });

        })

    };

    return {
        //== Init
        init: function () {
            initDemos();
        },
    };
}();

//== Class Initialization
jQuery(document).ready(function () {
    SweetAlert2Demo.init();
});