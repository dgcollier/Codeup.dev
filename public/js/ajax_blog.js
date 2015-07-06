"use strict";
    (function() {

        getAllPosts();

        function getAllPosts() {
        
            var ajaxRequest = $.ajax("/data/blog.json");

            ajaxRequest.always(function () {
                console.log("Fetching posts...");
            });

            ajaxRequest.fail(function () {
                console.log("No posts found.");
                alert("No posts found");
            });

            var blogPosts;
            ajaxRequest.done(function (data) {

                for (var i = 0; i < data.length; i++) {
                    blogPosts = $("#posts");
                    blogPosts.append("<h3>" + data[i].title + "</h3>");
                    blogPosts.append("<p>" + data[i].content + "</p>");
                    blogPosts.append("<h4 class='dateHeader'>" + "Date:" + "</h4>");
                    blogPosts.append("<span class='date'>" + data[i].date + "</span>");
                    blogPosts.append("<h5 class='tags'>" + "Tags:" + "</h5>")
                    blogPosts.append("<span class='categories'>" + data[i].categories + "</span>");
                    blogPosts.append("<br><button id='removePost' class='btn btn-default btn-xs'>" + "Delete This Post" + "</button>");
                    $("#posts").append(blogPosts);
                }
                console.log("Blog posts found.");
            });
        }

        $("#addPost").click(function () {

        });
    })();

    $(document).ready(function (){

        $("#addPost").click(function () {
            $("#addPostForm").toggleClass("invisible");

            if($(this).text() === "Add New Post") {
                $(this).text("Cancel");
                $(this).removeClass("btn-md");
                $(this).addClass("btn-sm");
            } else {
                $(this).text("Add New Post");
                $(this).removeClass("btn-sm");
                $(this).addClass("btn-md");
            }
        });

        $("#removePost").click(function () {

        })
    });

    // Don't forget to try .split() on your tags to separate btw commas

    // EXTRA CHALLENGES
    // attach event listener for new post form
    // attach event listener for remove post button

    // local storage
