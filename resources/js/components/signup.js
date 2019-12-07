import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";



class Signup extends Component {
    render() { 
        return (
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="p-5 m-4 border border-primary">
                            <form method="post">
                                <h2 className="text-left text-primary mb-5"><strong>Create</strong> an account.</h2>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="name">Name</label>
                                    <input id="name" className="form-control" type="text" name="name" placeholder="name" />
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="email">E-mail</label>
                                    <input id="email" className="form-control" type="email" name="email" placeholder="email" />
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="password">Password</label>
                                    <input id="password" className="form-control" type="password" name="password" placeholder="Password" />
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="re-password">Re-Password</label>
                                    <input id="re-password" className="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" />
                                </div>
                                <div className="form-group">
                                    <div className="form-check">
                                        <label htmlFor="agree" className="form-check-label">
                                            <input id="agree" className="form-check-input" type="checkbox" />I agree to the license terms.
                                        </label>
                                    </div>
                                </div>
                                <div className="form-group">
                                    <button className="btn btn-primary btn-block" type="submit">Create account</button>
                                </div>
                                <Link to="/login">
                                    <a className="text-center already d-block" href="#">You already have an account? Login here.</a>
                                </Link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         );
    }
}
 
export default Signup;