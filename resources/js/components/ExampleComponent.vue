<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <label for="numberToFactorial">Enter A Number To Factorial</label>
                    <input id="numberToFactorial" v-model="factorialNumber" />
                    <h2>Factorial = {{this.factorial(factorialNumber) }}</h2>
                </div>
                <div class="card">
                    <div class="card-header">Cover My Meds</div>
                    <div class="card-body">
                        I'm an example component.
                        <button v-on:click="sayHello()">Hello</button>
                    </div>
                    <div v-for="n in 300" v-if="n % 2 === 0" style="background: red;">
                        {{n}}
                    </div>
                    <div v-else style="background: blue;">
                        {{n}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                factorialNumber:  0
            }
        },
        mounted() {
            console.log('Component mounted.');
            console.log(this.factorial(15));
        },
        methods: {
            sayHello: function() {
                alert('hello');
            },
            create300Containers: function() {
                for(let i = 0; i < 300; i++)
                {

                }
            },
            factorial: function(numberToPass) {
                if (numberToPass.length === 0){
                    return 0;
                }
                if(numberToPass === 0 || numberToPass === 1){
                    return 1;
                } else if(numberToPass === 2) {
                    return 2;
                }

                let multipliedValue = 2;
                for(let num = 3; num <= numberToPass; num++){
                    // numberToPass = 5:  1, 1x2,2x3,6x4, 24x5
                    console.log(multipliedValue);
                    multipliedValue = multipliedValue * num;
                }
                return multipliedValue;
            }
        }
    }
</script>
