var listElement = document.querySelector('#app ul');
var inputElement = document.querySelector('#app input');
var buttonElement = document.querySelector('#app button');


var todos = [
	'Fazer café',
	'Estudar javascript',
	'Acessar xyz'
];

function renderTodos(){
	listElement.innerHTML = '';

	for (todo of todos){
		// cria elemento html document.createElement('li');
		var todoElement = document.createElement('li');

		var todoText = document.createTextNode(todo);
		
		// cria elemento html document.createElement('a');
		var linkElement = document.createElement('a');
		// cria um atributo pro elemento
		linkElement.setAttribute('href', '#');


		var pos = todos.indexOf(todo);
		
		// vê o evento de clique e chama a função deleteTodo(pos) passando o
		// parâmetro pos 
		linkElement.setAttribute('onclick','deleteTodo('+ pos +')');

		
		var linkText = document.createTextNode(' Excluir');
		linkElement.appendChild(linkText);


		todoElement.appendChild(todoText);
		todoElement.appendChild(linkElement);
		listElement.appendChild(todoElement);
	}
}

renderTodos();

function addTodo(){
	var todoText = inputElement.value;

	todos.push(todoText);
	inputElement.value = '';
	renderTodos();	
}

buttonElement.onclick = addTodo;

function deleteTodo(posicao){
	todos.splice(posicao, 1);
	renderTodos();
}