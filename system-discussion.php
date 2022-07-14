<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: system.php');
}

include 'include/header.inc.php';
require_once 'include/dbh.inc.php';
?>
<main>

    <?php
    include 'include/sidebar.inc.php';
    ?>
    <div class="c-content-threads">
        <div class="middle__content split">
            <div class="topic">
                <div class="d-flex justify-content-around text-center align-items-center">
                    <h1>Studies</h1>
                    <div class="d-flex">
                        <div class="input-group group-custom flex-nowrap me-3" id="input-search">
                            <label class="input-group-text group-custom" for="searchtopic"><i class="bi bi-search"></i></label>
                            <input type="text" class="form-control" placeholder="Search..." id="searchtopic">
                        </div>
                        <button class="btn button-primary px-4 py-2" type="button" id="new_Topic"><i class="bi bi-plus-circle-fill"></i> New Topic</button>
                    </div>

                </div>
                <div class="table__container">
                    <table id="topicTable" class="display">

                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="table__area">
                            <?php
                            $sql = 'SELECT * FROM discussion_records ORDER BY date_upload DESC';
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                            $max = 10;
                            while ($topic = $stmt->fetch() and $max > 0) {
                            ?>
                                <tr id="<?php echo $topic['discussion_id'] ?>" class="">
                                    <td>
                                        <i class="bi bi-folder2-open"></i>
                                    </td>

                                    <td>
                                        <div class="row__title d-flex justify-content-between flex-column">
                                            <div><?php echo $topic['discussion_title'] . ' ' . date('Y', strtotime($topic['date_upload'])); ?></div>
                                            <div><?php echo $topic['discussion_subtitle'] ?></div>
                                            <!-- <div>Started by Sahir &#8226; 16 Replies &#8226; Last Reply 2 hours ago by Edmardo</div> -->
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $max--;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="topic__content">
                <div class="editor-container" id="new_post">
                    <form action="" id="form_editor">
                        <?php if (empty($_GET['editId'])) {
                        ?>
                            <div class="mb-3">
                                <label for="Title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="Title" name="Title">
                            </div>
                            <div class="mb-3">
                                <label for="Subtitle" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" id="Subtitle" name="Subtitle" placeholder="Optional">
                            </div>
                            <div id="editor">
                                <p>Hello World!</p>
                                <p>Some initial <strong>bold</strong> text</p>
                                <p><br></p>
                            </div>
                        <?php
                        } else {

                            $sql = 'SELECT * FROM discussion_records WHERE discussion_id  = ?';
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([$_GET['editId']]);
                            $topic = $stmt->fetch();

                        ?>
                            <div class="mb-3">
                                <label for="Title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="Title" name="Title" value="<?php echo $topic['discussion_title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Subtitle" class="form-label">Subtitle</label>
                                <input type="text" class="form-control" id="Subtitle" name="Subtitle" placeholder="Optional" value="<?php echo $topic['discussion_subtitle'] ?>">
                            </div>
                            <div id="editor">
                            </div>
                        <?php
                        }
                        ?>
                        <button class="btn button-primary float-end mt-3 px-4 py-2" type="submit">Submit</button>
                    </form>
                </div>
                <div class="display-container" id="content">
                    <div class="main__content">
                        <div id="author">

                        </div>
                        <h3 id="content__title">
                        </h3>
                        <h5 id="content__subtitle">
                        </h5>
                        <div id="content__display">
                        </div>
                    </div>
                    <div class="reply__container" id="reply__container">


                    </div>
                    <div class="replyEdit__container pt-3 mt-3">
                        <form action="" id="comment__form">
                            <input type="hidden" name="topicID" id="topicID">
                            <div id="reply__editor">
                            </div>
                            <button class="btn button-primary float-end mt-3 px-4 py-2" type="submit"> <i class="bi bi-reply"></i> Submit Reply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php
include 'include/footer.inc.php';
?>


<script>
    $(document).ready(function() {

        var Scrollbar = window.Scrollbar;

        Scrollbar.init(document.querySelector('#content'));

        let topicTable = $('#topicTable').DataTable({
            dom: 'lrt',
            ordering: false,
            paging: false,
            scrollY: 700,
            "info": false,
            "columnDefs": [{
                "width": "1%",
                "targets": 0
            }, ],
            "drawCallback": function(settings) {
                $("#selector thead").hide();
            },
        });

        $('#searchtopic').keyup(function() {
            topicTable.search($(this).val()).draw();
        })

        let toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],
            ['link', 'image'],

            ['clean'] // remove formatting button
        ];
        let options = {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Compose an epic...',
            // readOnly: true,
            theme: 'snow'
        };
        let editor = new Quill('#editor', options);
        let currentContent = new Quill('#content__display', {
            theme: 'snow',
            modules: {
                "toolbar": false
            }
        });
        currentContent.disable();
        $("#form_editor").on('submit', function(e) {
            e.preventDefault();

            let delta = editor.getContents();
            let Form = $("#form_editor");
            // console.log(typeof delta);
            Form.append($('<input>').attr('type', 'hidden').attr('value', JSON.stringify(delta)).attr('name', 'delta'));

            let valueEdit = '<?php echo (isset($_GET['editId'])) ? $_GET['editId'] : 'none'; ?>';
            Form.append($('<input>').attr('type', 'hidden').attr('value', valueEdit).attr('name', 'editID'));
            $.ajax({
                type: 'POST',
                url: 'include/discussion-include/editor.inc.php',
                data: $(this).serialize()
            }).then(function(res) {
                let data = JSON.parse(res);
                if (data.error) {
                    console.log(data.error);
                    return;
                }

                <?php if (empty($_GET['editId'])) {
                ?>
                    location.reload();
                <?php
                } else { ?>
                    window.location.replace("system-discussion.php");
                <?php
                } ?>
            }).fail(function(res) {
                console.log(res);
            })

        });


        <?php if (empty($_GET['editId'])) {
        ?>
            changeTopic($("tbody tr:first-child").attr("id"));
            $('.editor-container').css('display') == 'none';
        <?php
        } else { ?>
            toggleDisplayTopic();
            <?php
            $sql = 'SELECT * FROM discussion_records WHERE discussion_id  = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_GET['editId']]);
            $topic = $stmt->fetch();
            ?>
            editor.setContents(<?php echo $topic['discussion_content'] ?>);

        <?php
        } ?>
        $("#new_Topic").click(function() {

            <?php if (empty($_GET['editId'])) {
            ?>
                toggleDisplayTopic();
            <?php
            } else { ?>
                window.location.replace("system-discussion.php");
            <?php
            } ?>
        });



        $("#topicTable").on("click", 'tr', function() {
            let curID = $(this).attr("id");
            changeTopic(curID);
        });

        function changeTopic(curID) {
            $.post('include/discussion-include/load-topic.inc.php', {
                id: curID
            }, function(delta, status) {
                delta = JSON.parse(delta);
                // console.log(delta.topic);
                // console.log(delta.comments);
                // console.log(delta.author);
                if (delta.error) {
                    console.log(delta.error);
                    return;
                }
                toggleDisplayTopic(true, curID);
                let AuthorDiv = `
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <div class="name">${delta.author.firstname} ${delta.author.lastname}</div>
                                        <p class="time_reply">on <span>${delta.topic.date_upload}</span></p>
                                        
                                    </div>
                                    <a type="button" href="system-discussion.php?editId=${delta.topic.discussion_id}" class="btn button-primary edit-button"><i class="bi bi-pencil-square"></i></a>
                                </div>
                                `;
                $("#author").html(AuthorDiv);


                $("#content__title").html(delta.topic.discussion_title);
                $("#content__subtitle").html(delta.topic.discussion_subtitle);
                $("#topicID").val(delta.topic.discussion_id);
                currentContent.setContents(JSON.parse(delta.topic.discussion_content));

                $("#reply__container").empty();
                for (let key in delta.comments) {
                    let elementReply =
                        `<div class="reply__c pt-3">
                            <div class="d-flex flex-column">
                                <div class="name">${delta.comments[key].user_title} ${delta.comments[key].user_name}</div>
                                <p class="time_reply">on <span>${delta.comments[key].comment.date_upload}</span></p>
                            </div>
                            <div id="comment${key}">
                            </div>

                            <div class="d-flex flex-row-reverse mb-3">
                                <button class="btn button-primary" content-comment = "comment${key}">
                                    <i class="bi bi-chat-square-quote"></i>
                                    Quote
                                </button>
                            </div>
                        </div>`;
                    $("#reply__container").append(elementReply);

                    let replyContent = new Quill('#comment' + key, {
                        theme: 'snow',
                        readOnly: true,
                        modules: {
                            "toolbar": false,
                        }
                    });
                    replyContent.setContents(JSON.parse(delta.comments[key].comment.comment));
                }
            });
        }

        function toggleDisplayTopic(changecontent = false, id) {
            if (!changecontent) {
                $("#new_post").toggle();
                $("#content").toggle();
            } else if ($("#new_post").is(":visible")) {
                $("#new_post").toggle();
                $("#content").toggle();
            }
            $("tr.active").removeClass('active');
            $("#" + id).addClass('active');
        }

        let replyEditor = new Quill('#reply__editor', options);

        $("#comment__form").on('submit', function(e) {
            e.preventDefault();

            let delta = replyEditor.getContents();
            let Form = $("#comment__form");
            // console.log(typeof delta);
            Form.append($('<input>').attr('type', 'hidden').attr('value', JSON.stringify(delta)).attr('name', 'replydelta'));
            $.ajax({
                type: 'POST',
                url: 'include/discussion-include/post-reply.inc.php',
                data: $(this).serialize()
            }).then(function(res) {
                let data = JSON.parse(res);
                if (data.error) {
                    console.log(data.error);
                    return;
                }
                location.reload();

            }).fail(function(res) {
                console.log("There are some errors upon posting");
            })

        });
        $(".reply__container").on('click', '.reply__c button', function(e) {

            var quill = new Quill("#" + $(this).attr('content-comment'), {
                theme: 'snow',
                readOnly: true,
                modules: {
                    "toolbar": false,
                }
            });
            console.log(quill.getContents());
            replyEditor.insertEmbed(0, 'blockquote', '');
            replyEditor.insertText(0, quill.getText().replace(/\n$/, ''));
        });

    });
</script>

</body>


</html>