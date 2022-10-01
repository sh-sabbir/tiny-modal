// get element shortcut
function $(e) {
	return document.getElementById(e);
}
// generic syntax parser
var parser = new Parser({
	whitespace: /\s+/,
	number: /0x[\dA-Fa-f]+|-?(\d+\.?\d*|\.\d+)|#[\dA-Fa-f]{3,6}/,
	comment: /\/\*([^\*]|\*[^\/])*(\*\/?)?|(\/\/|#)[^\r\n]*/,
	string: /"(\\.|[^"\r\n])*"?|'(\\.|[^'\r\n])*'?/,
	keyword: /(<\??)(\/|\!?)(\w+)/g,
	variable: /([a-z-]+)(?=\=)/gi,
	define: /[$A-Z_a-z0-9]+/,
	// op: /(=)('|")(.*?)(\2)/g,
	other: /\S/,
});
// wait for the page to finish loading before accessing the DOM
window.onload = function () {
	// // get the textarea
	// var textarea = $("codeArea");
	// // lets set it to something interesting
	// // textarea.value = "";
	// // start the decorator
	// decorator = new TextareaDecorator(textarea, parser);
	var field = document.getElementById("tm-code-editor-textarea");
	
	var editor = ace.edit("codeArea");
	editor.setTheme("ace/theme/monokai");
	editor.session.setMode("ace/mode/html");
	editor.setValue(field.value);
	editor.clearSelection();

	editor.session.on("change", function (e) {
		field.value = t.editor.getValue();
	});
};
