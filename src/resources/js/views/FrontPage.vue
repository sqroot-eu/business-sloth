<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <img src="https://www.publicdomainpictures.net/pictures/190000/velka/sloth-drawing.jpg" width="300"/>
                <p class="lead">As Business Sloth, I have relevant experience on how businessmen express themselves.
                One must use a plethora of complex business-lingo.</p>
                <p>Think you are worthy of joining our exclusive enterprise? Enter your Twitter username and we shall see...</p>
                <div class="card card-default">
                    <div class="card-header">The Sloth Test</div>

                    <div class="card-body">


                        <b-form inline @submit="onSubmit">
                            <label class="sr-only" for="twitter-name">Twitter name</label>
                            <b-input-group prepend="@" size="lg" class="mb-2 mr-sm-2 mb-sm-0">
                                <b-input id="twitter-name" v-model="form.name" placeholder="SQRooted" />
                            </b-input-group>
                            <b-button type="submit" size="lg" variant="primary">Submit CV</b-button>
                        </b-form>


                        <h1>{{ grade }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                form: {
                    name: '',
                },
                grade: null,
            }
        },
        methods: {
            onSubmit (evt) {
                evt.preventDefault();
                axios.get('/api/grade/sqrooted')
                    .then(response => {
                        this.grade = response.data.data.grade;
                    });
            }
        }
    }
</script>
