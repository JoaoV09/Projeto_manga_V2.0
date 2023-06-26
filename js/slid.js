addEventListener("DOMContentLoaded", () => {
    var balls = document.querySelector('.balls')
    var quant = document.querySelectorAll('.slides .imagens')
    var atual = 0
    var imagem = document.getElementById('atual')
    var avancar = document.getElementById('avancar')
    var voltar = document.getElementById('voltar')
    var rolar = true

    for (let i = 0; i < quant.length; i++) {
        var div = document.createElement('div')
        div.id = i
        balls.appendChild(div)
    }
    document.getElementById('0').classList.add('.imgatual')

    var pos = document.querySelectorAll('.balls div')

    for (let i = 0; i < pos.length; i++) {
        pos[i].addEventListener('click', () => {
            atual = pos[i].id
            rolar = false
            slide()
        })
    }

    voltar.addEventListener('click', () => {
        atual--
        rolar = false
        slide()
    })

    avancar.addEventListener('click', () => {
        atual++
        rolar = false
        slide()
    })

    function slide() {
        if (atual >= quant.length) {
            atual = 0
        } else if (atual < 0) {
            atual = quant.length - 1
        }

        document.querySelector('.imgatual').classList.remove('imgatual')
        imagem.style.marginLeft = -1120 * atual + 'px'
        document.getElementById(atual).classList.add('imgatual')
    }
    setInterval(() => {
        if (rolar) {
            atual++
            slide()
        } else {
            rolar = true
        }
    }, 4000)
});