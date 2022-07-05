	const mensagem = document.querySelector('#mensagem')

		function sumir(){

			mensagem.classList.add('sumir')
		}
			 setTimeout(sumir, 1000*2)

		function sumirGeral(){
			mensagem.setAttribute('class', 'sumirGeral')
		}
			setTimeout(sumirGeral, 1000*4)