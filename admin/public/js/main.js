const navButton = document.querySelectorAll('.nav-link');
navButton.forEach(button => {
    button.addEventListener('click', function () {
        navButton.forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
    });
});

// new visitor found
setInterval(() => {
    axios.get('newvisitor')
        .then(function (response) {
            if (response.data > 0) {
                $('.newvisitor').html(response.data);
            } else {
                $('.newvisitor').html(0);
            }
        }).catch(function (error) {
        $('.newvisitor').html(0);
    })
}, 200);

// log in
$('.logIn-btn').click(function () {
    event.preventDefault()
    let email = $('#logInEmail').val();
    let pass = $('#logInPassword').val()
    if (!email) {
        notify('Please enter email or user name', 'fail');
    } else if (!pass) {
        notify('Please enter password', 'fail');
    } else {
        axios.post('logIn', {
            email: email,
            password: pass
        }).then(function (response) {
            if (response.data != 0) {
                window.location.href = '/home';
                axios.post('temp', {
                    userMail: response.data[0].email,
                    pass: response.data[0].pass,
                    fName: response.data[0].first_name,
                    lName: response.data[0].last_name,
                    profile:response.data[0].profile
                }).then(function (response) {

                }).catch(function (error) {

                });
            } else {
                notify('User name or password is wrong', 'fail');
            }
        }).catch(function (error) {
            notify('User name or password is wrong', 'fail');
        });
    }
});

// sign up
$('.signIn-btn').click(function () {
    event.preventDefault()
    let firstName = $('#firstName').val(),
        lastName = $('#lastName').val(),
        signUpEmail = $('#signInEmail').val(),
        signUpPass = $('#signInPassword').val()
    let profilePic = document.querySelector('#signUpProfile').files[0];

    if (!firstName) {
        notify('Please enter first name', 'fail');
    } else if (!lastName) {
        notify('Please enter last name', 'fail');
    } else if (!signUpEmail) {
        notify('Please enter email or user name', 'fail');
    } else if (!signUpPass) {
        notify('Please enter password', 'fail');
    } else {
        axios.post('exesTingCheck', {
            email: signUpEmail
        }).then(function (response) {
            if (response.data == signUpEmail) {
                notify('User or email already exist', 'fail');
            } else {
                var userInfo = new FormData();
                userInfo.append('profile', profilePic);
                userInfo.append('firstName', firstName);
                userInfo.append('lastName', lastName);
                userInfo.append('email', signUpEmail);
                userInfo.append('password', signUpPass);
                let configSign = {
                    headers: {'content-type': 'multipart/form-data'}
                };
                axios.post('signUp', userInfo, configSign).then(function (response) {
                    if (response.data != 0) {
                        notify('Sign up success', 'success');
                        $('.log-card').html("<h3 class='text-white text-center mb-2'>Sign up successful</h3>" +
                            "<a class='btn btn-primary'  href='/'>Log in</a>"
                        )
                    } else {
                        notify('Sign up fail', 'fail');
                    }
                }).catch(function (error) {
                    notify('Sign up fail', 'fail');
                });

            }

        }).catch(function (error) {

        })
    }
});

// signup profile preview
$('#signUpProfile').change(function () {
    var reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (event) {
        var source = event.target.result;
        $('#profileUpPreView').attr('src', source);
    }
});

//sign out
$('#signOut').click(function () {
    axios.post('signout')
        .then(function (response) {
            if (response.status === 200) {
                window.location.href = '/';
            }
        }).catch(function (error) {
        alert('error');
    });
});
// ===============================================================
// member operation
// ===============================================================
loadMemberData();

function loadMemberData() {
    $('#member-data').empty();
    axios.get('memberdataget').then(function (response) {
        $.each(response.data, function (i, item) {
            $('<tr>').html(" " +
                "<th scope='row'>" + response.data[i].id + "</th>" +
                " <td>" + response.data[i].name + "</td>" +
                " <td>" + response.data[i].title + "</td>" +
                " <td>" + " <button class='operationBtn memberInfoEditBtn' data-id=" + response.data[i].id + "><i class='fa-solid fa-pen-to-square'></i> </button>" + "</td>" +
                " <td>" + " <button class='operationBtn memberInfoDelBtn' data-id=" + response.data[i].id + "><i class='fa-solid fa-circle-minus'></i> </button>" + "</td>"
            ).appendTo('#member-data');
        });
        // modal edit button
        $('.memberInfoEditBtn').click(function () {
            var id = $(this).data('id');
            $('#memberEditModal').modal('show');
            getmemberEditinfo(id);
        });

        // modal delete button
        $('.memberInfoDelBtn').click(function () {
            var id = $(this).data('id');
            $('#memberInfoDeleteModal').modal('show');
            $('.delete-member-id').html(id);
            getmemberEditinfo(id);
        });

    }).catch(function (error) {
        notify('Something wrong', 'fail');
    })
}

// delete modal hide
$('.memberDeleteCanBtn').click(function () {
    $('#memberInfoDeleteModal').modal('hide');
});

// delete confirm
$('.memberDeleteConfBtn').click(function () {
    $('.memberDeleteConfBtn').html('Deleting..');
    axios.post('memberinfodelete', {
        deleteId: $('.delete-member-id').html(),
        profileLink: $('.delete-profile-link').html()
    }).then(function (response) {
        if (response.status == 200 && response.data == 1) {
            notify('Member information deleted', 'success');
            $('#memberInfoDeleteModal').modal('hide');
            $('.memberDeleteConfBtn').html('Delete');
            loadMemberData();
        } else {
            notify('Delete fail !', 'fail');
            $('#memberInfoDeleteModal').modal('hide');
            $('.memberDeleteConfBtn').html('Delete');
        }
    }).catch(function (error) {
        notify('Delete fail !', 'fail');
        $('#memberInfoDeleteModal').modal('hide');
        $('.memberDeleteConfBtn').html('Delete');
    });

});

//edit modal hide
$('.btn-close-memberEditModal').click(function () {
    $('#memberEditModal').modal('hide');
});


//get member edit info
function getmemberEditinfo(editId) {
    axios.post('membereditinfoget', {
        editId: editId,
    }).then(function (response) {
        if (response.status == 200) {
            var infoData = response.data;
            $('#memberEditName').val(infoData[0].name);
            $('#memberEditTitle').val(infoData[0].title);
            $('#memberEditDescryption').val(infoData[0].descryption);
            $('#memberEditFacebook').val(infoData[0].facebook);
            $('#memberEditTwitter').val(infoData[0].twitter);
            $('#memberEditLinkedin').val(infoData[0].linkedin);
            $('#memberEditGoogle').val(infoData[0].google);
            $('#memberEditDribble').val(infoData[0].dribble);
            $('#memberEditId').val(infoData[0].id);
            $('.delete-profile-link').html(infoData[0].image);
            $('#memberEditOldProfileLink').val(infoData[0].image);
            $('#memberProfileEditImgPreview').css('display', 'block');
            $('#memberProfileEditImgPreview').attr('src', infoData[0].image);
        } else {
            notify('Something wrong', 'fail');
        }
    }).catch(function (error) {
        notify('Something wrong', 'fail');
    });
}

//edit confirm
$('#memberEditBtn').click(function () {
    event.preventDefault();
    $(this).html('Updating..');
    let memberProfileImgFileUp = document.querySelector('#memberProfileEditAttachment').files[0];
    if (memberProfileImgFileUp == undefined) {
        var profileUp = $('#memberEditOldProfileLink').val();
    } else {
        var profileUp = memberProfileImgFileUp;
    }
    let postDataUp = new FormData();
    postDataUp.append('image', profileUp);
    postDataUp.append('serial', $('#memberEditId').val());
    postDataUp.append('oldProfile', $('#memberEditOldProfileLink').val());
    postDataUp.append('memberName', $('#memberEditName').val());
    postDataUp.append('title', $('#memberEditTitle').val());
    postDataUp.append('descryption', $('#memberEditDescryption').val());
    postDataUp.append('memberEditFacebook', $('#memberEditFacebook').val());
    postDataUp.append('memberEditTwitter', $('#memberEditTwitter').val());
    postDataUp.append('memberEditLinkedin', $('#memberEditLinkedin').val());
    postDataUp.append('memberEditGoogle', $('#memberEditGoogle').val());
    postDataUp.append('memberEditDribble', $('#memberEditDribble').val());

    let urlUp = 'memberinfoupdate';
    let configUp = {
        headers: {'content-type': 'multipart/form-data'}
    };
    axios.post(urlUp, postDataUp, configUp)
        .then(function (response) {
            if (response.data == 1) {
                notify('Member info updated', 'success');
                $('#memberEditModal').modal('hide');
                $('#memberEditBtn').html('Update');
                loadMemberData();
            } else if (response.data == 0) {
                notify('No Change Found', 'fail');
                $('#memberEditModal').modal('hide');
                $('#memberEditBtn').html('Update');
            }
        }).catch(function (error) {
        $('#memberEditModal').modal('hide');
        $('#memberEditBtn').html('Update');
    });
});
//member add modal
$('#member-add').click(function () {
    $('#memberModal').modal('show');
});

// member modal close
$('.btn-close-memberModal').click(function () {
    $('#memberModal').modal('hide');
});

// member add button
$('.memberUpload-btn').click(function () {
    event.preventDefault();
    let memberData = new FormData();
    var fbLink = $('#memberFacebook').val();
    var twLink = $('#memberTwitter').val();
    var linkdLink = $('#memberLinkedin').val();
    var googleLink = $('#memberGoogle').val();
    var dirabbleLink = $('#memberDribble').val();
    if (!fbLink) {
        var fbLink = '#';
    }
    if (!twLink) {
        var twLink = '#';
    }
    if (!linkdLink) {
        var linkdLink = '#';
    }
    if (!googleLink) {
        var googleLink = '#';
    }
    if (!dirabbleLink) {
        var dirabbleLink = '#';
    }
    if (!$('#memberName').val()) {
        notify('Enter member name', 'fail');
    } else if (!$('#memberTitle').val()) {
        notify('Enter member title', 'fail');
    } else if (!$('#memberDescryption').val()) {
        notify('Enter a sort descryption', 'fail');
    } else if (!document.querySelector('#memberProfileAttachment').files[0]) {
        notify('Please select profile picture', 'fail');
    } else {
        memberData.append('memberProfileImage', document.querySelector('#memberProfileAttachment').files[0]);
        memberData.append('memberName', $('#memberName').val());
        memberData.append('memberTitle', $('#memberTitle').val());
        memberData.append('memberDes', $('#memberDescryption').val());
        memberData.append('memberFacebook', fbLink);
        memberData.append('memberTwitter', twLink);
        memberData.append('memberLinkedin', linkdLink);
        memberData.append('memberGoogle', googleLink);
        memberData.append('memberDribble', dirabbleLink);
        let addMemberUrl = 'memberadd';
        let config = {
            headers: {'content-type': 'multipart/form-data'}
        };
        axios.post(addMemberUrl, memberData, config)
            .then(function (response) {
                if (response.data == 1) {
                    notify('Member added', 'success');
                    $('#memberModal').modal('hide');
                    loadMemberData();
                } else {
                    notify('Something wrong', 'fail');
                    $('#memberModal').modal('hide');
                }

            }).catch(function (error) {
            notify('Something wrong', 'fail');
            $('#memberModal').modal('hide');
        });
    }

});

// member profile preview
$('#memberProfileAttachment').change(function () {
    var reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (event) {
        var source = event.target.result;
        $('#memberProfileImgPreview').css('display', 'block');
        $('#memberProfileImgPreview').attr('src', source);
    }
});

//member edit frofile view
$('#memberProfileEditAttachment').change(function () {
    var reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (event) {
        var source = event.target.result;
        $('#memberProfileEditImgPreview').css('display', 'block');
        $('#memberProfileEditImgPreview').attr('src', source);
    }
});

// ===============================================================
// testminal operation
// ===============================================================
// testimonials
testimonialsLoadPost();

function testimonialsLoadPost() {
    $('#testimonials-posts-data').empty();
    axios.get('testimonialspostget').then(function (response) {
        $.each(response.data, function (i, item) {
            $('<tr>').html(" " +
                "<th scope='row'>" + response.data[i].id + "</th>" +
                " <td>" + response.data[i].author + "</td>" +
                " <td>" + response.data[i].saying + "</td>" +
                " <td>" + " <button class='operationBtn editbtn' data-id=" + response.data[i].id + "><i class='fa-solid fa-pen-to-square'></i> </button>" + "</td>" +
                " <td>" + " <button class='operationBtn delbtn' data-id=" + response.data[i].id + "><i class='fa-solid fa-circle-minus'></i> </button>" + "</td>"
            ).appendTo('#testimonials-posts-data');
        });
        // modal edit button
        $('.editbtn').click(function () {
            var id = $(this).data('id');
            $('#testMinialUpdateModal').modal('show');
            getTestimonialsEditinfo(id);
        });

        // modal delete button
        $('.delbtn').click(function () {
            var id = $(this).data('id');
            $('#testimonialsDeleteModal').modal('show');
            $('.test-delete-id').html(id);
            getTestimonialsEditinfo(id);
        });

    }).catch(function (error) {
        notify('Somthing wrong', 'fail');
    })
}

// testimonials post create

$('#testimonials-post-add').click(function () {
    $('#testMonialPostModal').modal('show');
});
$('.btn-close-testInputModal').click(function () {
    $('#testMonialPostModal').modal('hide');
});

$('.author-upload-btn').click(function () {
    event.preventDefault();
    let img = document.querySelector('#authorProfileAttachment').files[0];
    if (!$('#authorName').val()) {
        notify('Please enter author name', 'fail');
    } else if (!$('#authorSaying').val()) {
        notify('Please enter author saying', 'fail');
    } else if (!img) {
        notify('Please select author profile picture', 'fail');
    } else {
        let authorData = new FormData();
        authorData.append('author', $('#authorName').val());
        authorData.append('saying', $('#authorSaying').val());
        authorData.append('profile', img);
        let urlUp = 'testimonialspost';
        let config = {
            headers: {'content-type': 'multipart/form-data'}
        };
        axios.post(urlUp, authorData, config)
            .then(function (response) {
                if (response.data == 1 & response.status == 200) {
                    notify('Post Created', 'success');
                    $('#testMonialPostModal').modal('hide');
                    testimonialsLoadPost();
                } else {
                    notify('Something wrong', 'fail');
                    $('#testMonialPostModal').modal('hide');
                }
            }).catch(function (reeor) {
            notify('Something wrong', 'fail');
            $('#testMonialPostModal').modal('hide');
        });
    }
});
// testimonials post delete cancel
$('.testDeleteCanBtn').click(function () {
    $('#testimonialsDeleteModal').modal('hide');
});

// testimonials post deleteconfirm
$('.testDeleteConfBtn').click(function () {
    axios.post('testimonialsdelete', {
        delId: $('.test-delete-id').html(),
        profileLink: $('.test-delete-link').html()
    }).then(function (response) {
        if (response.data == 1 & response.status == 200) {
            notify('Post deleted', 'success');
            $('#testimonialsDeleteModal').modal('hide');
            testimonialsLoadPost();
        } else {
            notify('Delete Fail', 'fail');
            $('#testimonialsDeleteModal').modal('hide');
        }
    }).catch(function (error) {
        notify('Delete Fail', 'fail');
        $('#testimonialsDeleteModal').modal('hide');
    });
});

// author-upload-btn
$('.author-upload-btn').click(function () {
    event.preventDefault()
    $(this).html('Updating..');

    let authorImgfileup = document.querySelector('#updateAuthorProfileAttachment').files[0];
    if (authorImgfileup == undefined) {
        var authorProfile = $('#testOldProfile').val();
    } else {
        var authorProfile = authorImgfileup;
    }
    let authorDataUp = new FormData();
    authorDataUp.append('image', authorProfile);
    authorDataUp.append('serial', $('#testDelId').val());
    authorDataUp.append('name', $('#updateAuthorName').val());
    authorDataUp.append('saying', $('#updateAuthorSaying').val());
    authorDataUp.append('oldProfile', $('#testOldProfile').val());

    let urlUp = 'authorinfoup';
    let configUp = {
        headers: {'content-type': 'multipart/form-data'}
    };
    axios.post(urlUp, authorDataUp, configUp)
        .then(function (response) {
            if (response.data == 1) {
                notify('Testimonials Post Updated', 'success');
                $('#testMinialUpdateModal').modal('hide');
                $('.author-upload-btn').html('Update');
                testimonialsLoadPost();
            } else if (response.data == 0) {
                notify('No Change Found', 'fail');
                $('#testMinialUpdateModal').modal('hide');
                $('.author-upload-btn').html('Update');
            }
        }).catch(function (error) {
        notify('Update Fail', 'fail');
        $('#testMinialUpdateModal').modal('hide');
        $('.author-upload-btn').html('Update');
    });
});

// testimonials update hide
$('.btn-close-testUpdateModal').click(function () {
    $('#testMinialUpdateModal').modal('hide');
});

// get information
function getTestimonialsEditinfo(editId) {
    axios.post('testimonialseditinfoget', {
        editId: editId,
    }).then(function (response) {
        if (response.status == 200) {
            var infoData = response.data;
            $('#updateAuthorName').val(infoData[0].author);
            $('#updateAuthorSaying').val(infoData[0].saying);
            $('#testOldProfile').val(infoData[0].image);
            $('#testDelId').val(infoData[0].id);
            $('.test-delete-link').html(infoData[0].image);
            $('#updateAuthorImgPreView').css('display', 'block');
            $('#updateAuthorImgPreView').attr('src', infoData[0].image);
        } else {
            notify('Somthing wrong', 'fail');
        }
    }).catch(function (error) {
        notify('Somthing wrong', 'fail');
    });
}
// ===============================================================
// works operation
// ===============================================================
// loaddata
loadpost();

function loadpost() {
    $('#posts-data').empty();
    axios.get('postget').then(function (response) {
        $.each(response.data, function (i, item) {
            $('<tr>').html(" " +
                "<th scope='row'>" + response.data[i].id + "</th>" +
                " <td>" + response.data[i].project_name + "</td>" +
                " <td>" + response.data[i].designer + "</td>" +
                " <td>" + " <button class='operationBtn editbtn' data-id=" + response.data[i].id + "><i class='fa-solid fa-pen-to-square'></i> </button>" + "</td>" +
                " <td>" + " <button class='operationBtn delbtn' data-id=" + response.data[i].id + "><i class='fa-solid fa-circle-minus'></i> </button>" + "</td>"
            ).appendTo('#posts-data');
        });
        // modal edit button
        $('.editbtn').click(function () {
            var id = $(this).data('id');
            $('#editModal').modal('show');
            $('.edit-id').html(id);
            getEditinfo(id);
        });

        // modal delete button
        $('.delbtn').click(function () {
            var id = $(this).data('id');
            $('#deleteModal').modal('show');
            $('.delete-id').html(id);
            getEditinfo(id);
        });

    }).catch(function (error) {
        notify('Somthing wrong', 'fail');
    })
}

// get edit info
function getEditinfo(editId) {
    axios.post('editinfoget', {
        editId: editId,
    }).then(function (response) {
        if (response.status == 200) {
            var infoData = response.data;
            $('#projecTnameUp').val(infoData[0].project_name);
            $('#projecTcatagoryUp').val(infoData[0].category);
            $('#projecTdesignerUp').val(infoData[0].designer);
            $('#uniqueid').val(infoData[0].post_id);
            $('#oldprofilelink').val(infoData[0].img_link);
            $('#seralid').val(infoData[0].id);
            $('.delete-link').html(infoData[0].img_link);
            $('#imgpreviewup').css('display', 'block');
            $('#imgpreviewup').attr('src', infoData[0].img_link);
        } else {
            notify('Somthing wrong', 'fail');
        }
    }).catch(function (error) {
        notify('Somthing wrong', 'fail');
    });
}

// cancel edit
$('.editCanButton').click(function () {
    $('#editModal').modal('hide');
});

// confirm edit
$('.editConButton').click(function () {
    event.preventDefault();
    $(this).html('Updating..');
    // post updating
    let imgfileup = document.querySelector('#projecTattachmentUp').files[0];
    if (imgfileup == undefined) {
        var profile = $('#oldprofilelink').val();
    } else {
        var profile = imgfileup;
    }
    let postDataUp = new FormData();
    postDataUp.append('image', profile);
    postDataUp.append('serial', $('#seralid').val());
    postDataUp.append('uniqueId', $('#uniqueid').val());
    postDataUp.append('projecTname', $('#projecTnameUp').val());
    postDataUp.append('projecTcatagory', $('#projecTcatagoryUp').val());
    postDataUp.append('projecTdesigner', $('#projecTdesignerUp').val());
    postDataUp.append('oldProfileLinkForDElete', $('#oldprofilelink').val());

    let urlUp = 'workupdate';
    let configUp = {
        headers: {'content-type': 'multipart/form-data'}
    };
    axios.post(urlUp, postDataUp, configUp)
        .then(function (response) {
            if (response.data == 1) {
                notify('Post Updated', 'success');
                $('#editModal').modal('hide');
                $('.editConButton').html('Update');
                loadpost();
            } else if (response.data == 0) {
                notify('No Change Found', 'fail');
                $('#editModal').modal('hide');
                $('.editConButton').html('Update');
            }
        }).catch(function (error) {
        notify('Update Fail', 'fail');
        $('#editModal').modal('hide');
        $('.editConButton').html('Update');
    });
});


// modal delete confirm
$('.deleteConfBtn').click(function () {
    let delete_id = $('.delete-id').html();
    let delete_link = $('.delete-link').html();
    postDeleteConfirm(delete_id, delete_link);
})
// delete modal hide
$('.deleteCanfBtn').click(function () {
    $('#deleteModal').modal('hide');
});

// post delete confirm
function postDeleteConfirm(delete_id, delete_link) {
    axios.post('postdelete', {
        deleteid: delete_id,
        deletelink: delete_link
    }).then(function (response) {
        if (response.data == 1 & response.status == 200) {
            notify('Post Deleted', 'success');
            $('#deleteModal').modal('hide');
            loadpost();
        } else {
            notify('Delete Fail', 'fail');
            $('#deleteModal').modal('hide');
        }
    }).catch(function (error) {
        notify('Delete Fail', 'fail');
        $('#deleteModal').modal('hide');
    })
}

// post modal show
$('#work-add').click(function () {
    $('#postModal').modal('show');
});

// post modal hide
$('.btn-close-inputmodal').click(function () {
    $('#postModal').modal('hide');
});
// post upload
$('.upload-btn').click(function () {
    event.preventDefault()
    $(this).html('Uploading..');

    const postid = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 20);
    // post upload
    let postData = new FormData();
    postData.append('image', document.querySelector('#projecTattachment').files[0]);
    postData.append('postid', postid);
    postData.append('projecTname', $('#projecTname').val());
    postData.append('projecTcatagory', $('#projecTcatagory').val());
    postData.append('projecTdesigner', $('#projecTdesigner').val());
    let url = 'workup';
    let config = {
        headers: {'content-type': 'multipart/form-data'}
    };
    axios.post(url, postData, config)
        .then(function (response) {
            if (response.status == 200 & response.data == 1) {
                $('#postModal').modal('hide');
                $('.upload-btn').html('Upload');
                notify('Post Uploaded', 'success');
                $('#projecTname').val('');
                $('#projecTcatagory').val('');
                $('#projecTdesigner').val('');
                $('#projecTattachment').val('');
                $('#imgpreview').css('display', 'none');
                loadpost();
            } else {
                notify('Upload fail', 'fail');
                $('#projecTname').val('');
                $('#projecTcatagory').val('');
                $('#projecTdesigner').val('');
                $('#projecTattachment').val('');
                $('#imgpreview').css('display', 'none');
                $('#postModal').modal('hide');
            }
        }).catch(function (error) {
        notify('Upload fail', 'fail');
        $('#projecTname').val('');
        $('#projecTcatagory').val('');
        $('#projecTdesigner').val('');
        $('#projecTattachment').val('');
        $('#imgpreview').css('display', 'none');
        $('#postModal').modal('hide');
    });
});

// post upload img preview
$('#projecTattachment').change(function () {
    var reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (event) {
        var source = event.target.result;
        $('#imgpreview').css('display', 'block');
        $('#imgpreview').attr('src', source);
    }
});

// post update image preview
$('#projecTattachmentUp').change(function () {
    var reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (event) {
        var source = event.target.result;
        $('#imgpreviewup').css('display', 'block');
        $('#imgpreviewup').attr('src', source);
    }
});


// ===============================================================
// visitor operation
// ===============================================================
// loadVisitorPost
loadVisitorPost();

function loadVisitorPost() {
    $('#visitor-data').empty();
    axios.get('visitorsinfo').then(function (response) {
        $.each(response.data, function (i, item) {
            $('<tr>').html(
                "<th scope='row'>" + response.data[i].id + "</th>" +
                "<td>" + response.data[i].ip + "</td>" +
                "<td>" + response.data[i].time + "</td>" +
                "<td>" + response.data[i].date + "</td>" +
                "<td>" +
                "<button class='operationBtn visitorDeleteBtn' data-id=" + response.data[i].id + "> <i class='fa-solid fa-circle-minus'></i></button>" +
                "</td>"
            ).appendTo('#visitor-data');
        });
        // modal delete button
        $('.visitorDeleteBtn').click(function () {
            var id = $(this).data('id');
            $('#visitorDeleteModal').modal('show');
            $('.visitorDelete-id').html(id);
        });

    }).catch(function (error) {
        notify('Somthing wrong', 'fail');
    })
}

// visitor cancel
$('.visitorDeleteCanfBtn').click(function () {
    $('#visitorDeleteModal').modal('hide');
});

//visitor delete confirm
$('.visitorDeleteConfBtn').click(function () {
    let delete_id = $('.visitorDelete-id').html();
    axios.post('visitordelete', {
        deleteId: delete_id
    }).then(function (response) {
        if (response.data == 1 & response.status == 200) {
            notify('Visitor Data Deleted', 'success');
            $('#visitorDeleteModal').modal('hide');
            loadVisitorPost();
        } else {
            notify('Visitor Data Delete Fail', 'fail');
            $('#visitorDeleteModal').modal('hide');
        }
    }).catch(function (error) {
        notify('Visitor Data Delete Fail', 'fail');
        $('#visitorDeleteModal').modal('hide');
    })
});


