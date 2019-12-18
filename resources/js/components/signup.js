import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";



class Signup extends Component {
    constructor() {
        super();
        this.state = {
            name: '',
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
            name: this.state.name,
            email: this.state.email,
            password: this.state.password
        }

        fetch("/api/governrates", {
            method: 'get',
            body: JSON.stringify(tmpData),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json'
            }
        }).then(res => {
                return res.json();
                // if(res) {
                //     this.props.add_admin(fetchData);
                //     this.props.history.push('/dashboard/admin');
                // }
            })
            //.then(data => console.log(data))
            .catch(err => console.error("Error:", err));


        this.setState({
            name: '',
            email: '',
            password: ''
        })
    }

    render() {
        return (
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="p-5 m-4 border border-primary">
                            <form onSubmit={this.sendData}>
                                <h2 className="text-left text-primary mb-5"><strong>Create</strong> an account.</h2>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="name">Name</label>
                                    <input required
                                    id="name" 
                                    className="form-control" 
                                    type="text" 
                                    name="name" 
                                    placeholder="name" 
                                    onChange={this.changeHandler}
                                    />
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="email">E-mail</label>
                                    <input required 
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
                                    <input required 
                                    id="password" 
                                    className="form-control" 
                                    type="password" 
                                    name="password"
                                    placeholder="Password" 
                                    onChange={this.changeHandler}
                                    />
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="re-password">Re-Password</label>
                                    <input required id="re-password" className="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" />
                                </div>
                                <div className="form-group">
                                    <div className="form-check">
                                        <label htmlFor="agree" className="form-check-label">
                                            <input required id="agree" className="form-check-input" type="checkbox" />I agree to the license terms.
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