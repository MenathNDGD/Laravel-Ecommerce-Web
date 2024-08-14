<h1 class="sectionHead">
    Customer <span>Thoughts</span>
</h1>

<div class="comment-section">
    <h1>Add Your Thoughts Here...</h1>

    <form action="{{ url('add_comment') }}" method="POST" class="comment-form">
        @csrf
        <textarea placeholder="Comment Something Here..." name="comment" class="comment-textarea"></textarea>
        <input type="submit" class="btn btn-primary" value="Comment">
    </form>
</div>

<div class="comments-list">
    <h1>Comments from Customers</h1>

    <div class="comments-grid">
        @foreach($comment as $comment)
            <div class="comment-item card">
                <b>{{ $comment->name }}</b>
                <p>{{ $comment->comment }}</p>
                <a href="javascript:void(0);" class="btn btn-secondary reply-btn" onclick="reply(this)" data-CommentId="{{ $comment->id }}">Reply</a>

                @foreach ($reply as $rep)
                    @if ($rep->comment_id == $comment->id)
                        <div class="reply-item">
                            <b>{{ $rep->name }}</b>
                            <p>{{ $rep->reply }}</p>
                            <a href="javascript:void(0);" class="btn btn-secondary reply-btn" onclick="reply(this)" data-CommentId="{{ $comment->id }}">Reply</a>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="reply-section" style="display: none;">
        <form action="{{ url('add_reply') }}" method="POST">
            @csrf
            <input type="text" id="commentId" name="commentId" hidden>
            <textarea placeholder="Write Your Reply Here..." class="reply-textarea" name="reply"></textarea>
            <div class="reply-buttons">
                <button type="submit" class="btn btn-primary">Reply</button>
                <a href="javascript:void(0);" class="btn btn-dark" onclick="replyClose(this)">Cancel</a>
            </div>
        </form>
    </div>
</div>


<script>
    function reply(caller) {
    document.getElementById('commentId').value = $(caller).attr('data-CommentId');

    const replySection = document.querySelector('.reply-section');
    const commentItem = caller.closest('.comment-item');
    
    commentItem.appendChild(replySection);
    
    replySection.style.display = 'block';
}

function replyClose(caller) {
    const replySection = document.querySelector('.reply-section');
    
    replySection.style.display = 'none';
}

</script>

<script>
    document.addEventListener("DOMContentLoaded", function(event) { 
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>

<style>
    .sectionHead {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 30px;
}

.sectionHead span {
    color: #ff4d4d;
    position: relative;
}

.sectionHead span::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -10px;
    transform: translateX(-50%);
    width: 60%;
    height: 3px;
    background-color: #ff4d4d;
}

.comment-section, .comments-list {
    max-width: 1200px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}

.comment-section h1, .comments-list h1 {
    color: #555;
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

.comment-form {
    margin-bottom: 20px;
}

.comment-textarea {
    width: 100%;
    height: 120px;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #ddd;
    box-sizing: border-box;
    margin-bottom: 20px;
    font-size: 16px;
    line-height: 1.5;
}

.btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    text-decoration: none;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
}

.btn-secondary {
    background-color: #6c757d;
    color: #fff;
    border: none;
}

.btn-dark {
    background-color: #343a40;
    color: #fff;
    border: none;
}

.comments-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.comment-item {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.comment-item b {
    font-size: 18px;
    color: #007bff;
    margin-bottom: 5px;
    display: block;
}

.reply-item {
    margin-top: 15px;
    padding-left: 15px;
    border-left: 3px solid #007bff;
}

.reply-section {
    display: none;
    margin-top: 20px;
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.05);
}

.reply-textarea {
    width: 100%;
    height: 80px;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ddd;
    box-sizing: border-box;
    margin-bottom: 15px;
    font-size: 16px;
    line-height: 1.5;
}

.reply-buttons {
    text-align: right;
}

.reply-buttons .btn {
    margin-left: 10px;
}

</style>
