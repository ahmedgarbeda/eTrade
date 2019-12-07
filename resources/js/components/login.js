import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class Login extends Component {
    render() { 
        return (
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="p-5 m-4 border border-primary">
                            <form method="post">
                                <h2 className="text-left text-primary mb-5"><strong>Sign in.</strong></h2>

                                <div className="form-group">
                                    <label className="text-primary" htmlFor="email">E-mail</label>
                                    <input id="email" className="form-control" type="email" name="email" placeholder="email" />
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="password">Password</label>
                                    <input id="password" className="form-control" type="password" name="password" placeholder="Password" />
                                </div>
                                <div className="form-group">
                                    <button className="btn btn-primary btn-block" type="submit">Log in</button>
                                </div>
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
 
export default Login;