document.getElementById('object') = object
const search = (val, arr) => {
    for (let i = 0; i < arr.length; i++) {
        if (val === arr[i]) {
            return i
        }
    }
    return -1
}
const binary = (val, arr) => {
    let min = 0
    let max = arr.length - 1

    while (min <= max) {
        console.log('try')
        const middle = min + Math.floor((max - min) / 2)

        if (val === arr[middle]) {
            return middle
        }
        if (val < arr[middle]) {
            max = middle - 1
        } else {
            min = middle + 1
        }
    }

    return -1
}

//const values = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
const values = ['фото', 'видео', 'ведущие', 'монтаж', 'комплект']
const object = prompt('Поиск:')
console.log(search(object, values))


////const lastName = prompt('Введите фамилию:')