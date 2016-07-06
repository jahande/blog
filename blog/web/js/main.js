function ajaxSendComment(id){
	//alert("seee");
	author = document.getElementById('txtname').value;
	content = document.getElementById('txtarea').value;
	//alert(author);
	//alert(content);
	//alert(id);
	$.ajax( {
		type : "POST",
		url : "/view/ajaxAddComment/"+id,
		data: "comment[author]="+author+"&comment[content]="+content,
		//dataType : "xml",
		success : function(res) {
		//alert(res);
		div = document.createElement("DIV");
		div.innerHTML = res;
		document.getElementById('postComments').appendChild(document.createElement("HR"));
		document.getElementById('postComments').appendChild(div);
		//.get
		//$("#post")
			//like = document.getElementById('postLike'+postId).innerHTML;
			//like = parseInt(like);
			//document.getElementById('postLike'+postId).innerHTML = (like+1)+'+';
		// xml = data;
		//alert("like");
	}
	});
}
function likePost(postId) {
	//alert('sss');
	$.ajax( {
		type : "GET",
		url : "/view/liker/id/"+postId,
		//dataType : "xml",
		success : function() {
		//.get
		//$("#post")
			like = document.getElementById('postLike'+postId).innerHTML;
			like = parseInt(like);
			document.getElementById('postLike'+postId).innerHTML = (like+1)+'+';
		// xml = data;
		//alert("like");
	}
	});
}
function dislikePost(postId) {
	//alert('sss');
	$.ajax( {
		type : "GET",
		url : "/view/disliker/id/"+postId,
		//dataType : "xml",
		success : function() {
		//.get
		//$("#post")
			like = document.getElementById('postDislike'+postId).innerHTML;
			like = parseInt(like);
			document.getElementById('postDislike'+postId).innerHTML = (like+1)+'-';
		// xml = data;
		//alert("like");
	}
	});
}
function dislikeComment(commentId) {
	//alert('sss');
	$.ajax( {
		type : "GET",
		url : "/view/commentDisliker/id/"+commentId,
		//dataType : "xml",
		success : function() {
		//.get
		//$("#post")
			like = document.getElementById('commentDislike'+commentId).innerHTML;
			like = parseInt(like);
			document.getElementById('commentDislike'+commentId).innerHTML = (like+1)+'-';
		// xml = data;
		//alert("like");
	}
	});
}
function likeComment(commentId) {
	//alert('sss');
	$.ajax( {
		type : "GET",
		url : "/view/commentLiker/id/"+commentId,
		//dataType : "xml",
		success : function() {
		//.get
		//$("#post")
			like = document.getElementById('commentLike'+commentId).innerHTML;
			like = parseInt(like);
			document.getElementById('commentLike'+commentId).innerHTML = (like+1)+'+';
		// xml = data;
		//alert("like");
	}
	});
}
