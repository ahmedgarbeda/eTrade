import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link, withRouter} from "react-router-dom";

class Login extends Component {
     constructor() {
        super();
        this.state = {
            email: '',
            password: ''
        }
        this.changeHandler = this.changeHandler.bind(this);
        this.sendData = this.sendData.bind(this);
     }

    changeHandler(event) {
        const fieldValue = event.target.name;
        this.setState({
            [fieldValue]: event.target.value
        })
    }

    sendData(event) {
        event.preventDefault();

        let tmpData = {
            email: this.state.email,
            password: this.state.password
        }
        this.props.logUser(tmpData);
    }



    render() { 
        return (
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="p-5 m-4 border border-primary">
                            <form onSubmit={this.sendData}>
                                <h2 className="text-left text-primary mb-5"><strong>Sign in.</strong></h2>
                                <div class=
                                {"alert alert-danger h4 text-center "+(this.props.errorState?'':'d-none')}
                                role="alert">
                                    <i class="fas fa-exclamation-triangle pr-2"></i>{this.props.errorMessage}
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="email">E-mail</label>
                                    <input
                                    required
                                    id="email" 
                                    className="form-control" 
                                    type="email" 
                                    name="email" 
                                    placeholder="email" 
                                    onChange={this.changeHandler}
                                    />
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="password">Password</label>
                                    <input
                                    required
                                    id="password" 
                                    className="form-control" 
                                    type="password" 
                                    name="password" 
                                    placeholder="Password" 
                                    onChange={this.changeHandler}
                                    />
                                </div>
                                {(this.props.waitingTime?
                                <button class="btn btn-primary btn-block" type="button" disabled>
                                    Loading...
                                    <span class="spinner-border spinner-border-sm mx-3" role="status" aria-hidden="true"></span>
                                </button>:
                                <div className="form-group">
                                    <button className="btn btn-primary btn-block" type="submit">Log in</button>
                                </div>
                                )}
                                <Link to="/sign-up">
                                    <a className="text-center already d-block">Need an account? Create account here.</a>
                                </Link>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         );
    }
}
 
export default withRouter(Login);