<template>
	<section class="grid-12 cabinet">
	<div class="flex-hcenter-wrap title">
		<h1>Личный кабинет</h1>
	</div>
	<div class="flex-wrap-sp cont-1">
	 	<div class="flex-hcenter-wrap">
		 	<table>
		 		<tr>
		 			<td class="td-left">Имя:</td>
		 			<td class="td-right">{{userName}}</td>
		 		</tr>
		 		<tr>
		 			<td class="td-left">Дата регистрации:</td>
		 			<td class="td-right">{{reg_date}}</td>
		 		</tr>
		 		<tr>
					<td class="td-left">Последний визит:</td>
					<td class="td-right">25.01.2019</td>
				</tr>
		 	</table>
		</div>
		<div class="flex-hcenter-wrap">
			<table>
				
			</table>
		</div>		
	</div>
	<div class="flex-hcenter-wrap cont-2">
		<button type="button" class="btn btn-primary">Пройти тест</button>
	</div>		
	<div class="flex-hcenter-wrap cont-2">
		<button type="button" class="btn btn-light">История прохождения тестов</button>
	</div>
	<div class="flex-hcenter-wrap cont-2">
		<button type="button" class="btn btn-light">Задать вопрос</button>
	</div>
	<div class="cabinet-logout">
		
		<button id="logout" v-on:click="logout">выйти</button>
	</div>
	
</section>
</template>
<script>
export default {
	mounted(){

		var xhr = new XMLHttpRequest();
      	let body = new FormData();
      	body.append("type", encodeURIComponent('getinf')); 
      	  xhr.withCredentials = true; 
          xhr.open('post', '../php/cabinet.php', false);
          xhr.send(body);
          if (xhr.status != 200) {
            console.log( xhr.status + ': ' + xhr.statusText ); 
          } else {
          		let userInfo = JSON.parse(xhr.responseText);
          		console.log(userInfo);
            	console.log(' регистрация:' + userInfo['reg_date']);
            	this.reg_date = userInfo['reg_date'];
            	this.userName = userInfo['name'] + ' ' + userInfo['surname'];
            	console.log('ім`я користувача: '  + userInfo['name']);
      	}
	
	

	},
	data(){
		return{
			reg_date:'',
			userName:''
		}
	},
	methods:{
		
    logout(){
    
    
    var xhr = new XMLHttpRequest();
      	let body = new FormData();
      	body.append("type", encodeURIComponent('logout')); 
      	  xhr.withCredentials = true; 
          xhr.open('post', '../php/logout.php', false);
          xhr.send(body);
          if (xhr.status != 200) {
            // обработать ошибку
            console.log( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
          } else {
            	this.$emit('onLogout');
      	}
		}
	}
}		
	
</script>
<style lang="scss">
	$font:verdana;
	$colBlue:#0095a6;
	$colBlueBtnHover:#22a7c8;
	$colP1:#444;
	.grid-12{
		display:grid;
		grid-template-columns:  repeat(12, 1fr);
	}
	.flex-hcenter-wrap{
		display: flex;
		justify-content: center;
		flex-wrap: wrap;
	}
	.cabinet{
		.title{
			grid-column: 1/13;
			h1{
				font-family: $font;
				font-weight: 100;
				color:$colBlue;
			}
		}
		.cont-1{
			grid-column: 2/12;
			table{
				margin:1em 0;	
			}
			.td-left{
				width: 20em;
				padding: 0.5em 0	em;
				color:$colBlue;
				font-size:0.8em;
				
			}
			.td-right{
				color:$colBlue;
				
			}
			
			
		}
		.cont-2{
			grid-column: 2/12;
			.btn-primary{
				margin: 2em 0 1em 0;
				background:$colBlue;
				border-color:$colBlue;
				padding: 0.3em 2em;
				font-size: 1.5em;

			}
			.btn-primary:hover{
				background:$colBlueBtnHover;
				border-color:$colBlue;
			}
			.btn-light{
				color:$colBlue;
				margin: 1em 0;
				border-color:rgba(0, 149, 166, 0.3);
				padding: 0.2em 2em;
				font-size: 1.1em;
			}
		}
	}
</style>