<template>
    <div class="container">
        <div class="friends-container">
            <div v-for="friend in  randomFriends">
                <div v-if="friend === 'Ray'">
                    <h3 class="friend-greeting" style="background-color:#80FFDD"> Hello <span style="color:red;">{{friend}}</span></h3>
                </div>
                <div v-else-if="friend === 'Oscar'">
                    <h3 class="friend-greeting"style="background-color:#7496E8" > Hello <span style="color:orange;">{{friend}}</span></h3>
                </div>
                <div v-else-if="friend === 'Gwen'">
                    <h3 class="friend-greeting" style="background-color:#FF8D70"> Hello <span style="color:green;">{{friend}}</span></h3>
                </div>
                <div v-else-if="friend === 'Bob'">
                    <h3 class="friend-greeting" style="background-color:#FF4C3A"> Hello <span style="color:blue;">{{friend}}</span></h3>
                </div>
                <div v-else>
                    <h3 class="friend-greeting" style="background-color:#EBB805"> Hello <span style="color:magenta">{{friend}}</span></h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            const friendsArray = ["Ray", "Oscar", "Gwen", "Bob", "Marie"];
            let randomFriends = this.randomizeFriends(friendsArray);
            return {
                randomFriends
            }
        },
        mounted() {
            console.log('Cover My Meds.');
        },
        methods: {
            randomizeFriends(friends)
            {
                let currentIndex = 0
                    , randomIndex = 0
                    , temp = null
                ;

                for (currentIndex = friends.length - 1; currentIndex > 0; currentIndex -= 1) {
                    randomIndex  = Math.floor(Math.random() * (currentIndex + 1));
                    temp = friends[currentIndex];
                    friends[currentIndex] = friends[randomIndex];
                    friends[randomIndex] = temp
                }
                return friends;
            }
        }
    }

//    Using Javascript, add a greeting for each of your friends to the page, each on their own line and centered.
//     Friends: Ray, Oscar, Gwen, Bob, and Marie
//     red, orange, green, blue, and magenta
</script>
