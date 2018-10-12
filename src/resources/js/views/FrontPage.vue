<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">The Sloth Test</div>

                    <div class="card-body">


                        <b-form inline @submit="onSubmit">
                            <label class="sr-only" for="twitter-name">Twitter name</label>
                            <b-input-group prepend="@" size="lg" class="mb-2 mr-sm-2 mb-sm-0">
                                <b-input id="twitter-name" v-model="form.name" placeholder="SQRooted" />
                            </b-input-group>
                            <b-button type="submit" size="lg" variant="primary">Assess</b-button>
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
                alert(this.form.name)
                axios.get('/api/grade/sqrooted')
                    .then(response => {
                        this.grade = response.data.data.grade;
                    });
            }
        }
    }
</script>
