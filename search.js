function searchNear(arr, num) {
    let left = -1;
    let right = arr.length;
    let middle = 0
    while(right - left > 1) {
        middle = Math.floor((right+left)/2)
       
        if (arr[middle] === num) {
            return arr[middle]
        }
        if (num < arr[middle]) {
            right = middle
        } else {
            left = middle
        }
    }
    let lNum = -Infinity;
    let rNum = Infinity;
    if (arr[left]) {
        lNum = num - arr[left]
    }
    if (arr[right]) {
        rNum = arr[right] - num
    }
    if (lNum < rNum) {
        return arr[left]
    }
    return arr[right]
}

console.log(searchNear([1,5,6,8,10,20,40,61], 54))
console.log(searchNear([1,5,6,8,10,20,40,61], 30))
console.log(searchNear([1,5,6,8,10,20,40,61], 24))

