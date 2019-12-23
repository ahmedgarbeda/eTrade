import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link, withRouter} from "react-router-dom";



class Signup extends Component {
    constructor() {
        super();
        this.state = {
            name: '',
            email: '',
            username: '',
            password: '',
            password_confirmation: '',
            phone: '',
            address:'',
            governrate_id: '',
            governrates: []
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

        const {name, email, username, password, password_confirmation, phone, address, governrate_id} = this.state;

        let tmpData = {
            name: name,
            email: email,
            username: username,
            password: password,
            password_confirmation: password_confirmation,
            phone: phone,
            address: address,
            governrate_id: governrate_id
        }

        if(
            (name === ' ' && name < 6) || 
            (username === ' ' && username < 6) || 
            (!email.includes('@') && !email.includes('.')) ||
            (password < 6) ||
            (password !== password_confirmation) ||
            (address === ' ' && address < 6) ||
            (phone < 6)) {
            alert('false')
        }else {
            this.props.addUser(tmpData);

            this.setState({
                name: '',
                email: '',
                username: '',
                password: '',
                password_confirmation: '',
                phone: '',
                address: '',
                governrate_id: ''
            })
        }
    }

    componentDidMount() {
        fetch("/api/governrates")
        .then(req => req.json())
        .then(res => {
            const governrates = res.map(governrate => {
                return governrate;
            })
            this.setState({
                governrates: governrates
            })
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
                                    <label className="text-primary" htmlFor="username">User name</label>
                                    <input required 
                                    id="username" 
                                    className="form-control" 
                                    type="text" 
                                    name="username" 
                                    placeholder="username"
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
                                    <label className="text-primary" htmlFor="password-confirm">Confirmation password</label>
                                    <input 
                                    required id="password-confirm" 
                                    className="form-control" 
                                    type="password" 
                                    name="password_confirmation" 
                                    placeholder="comfirmation password"
                                    onChange={this.changeHandler}
                                    />
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="address">Address</label>
                                    <input required 
                                    id="address" 
                                    className="form-control" 
                                    type="text" 
                                    name="address"
                                    placeholder="address" 
                                    onChange={this.changeHandler}
                                    />
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="governrate">Governrate</label>
                                    <select 
                                    required id="governrate" 
                                    className="form-control"
                                    name="governrate_id"
                                    onChange={this.changeHandler}
                                    value={this.state.governrate_id}>
                                        <option value="default">select government</option>
                                       {
                                            this.state.governrates.map(governrate=> (
                                                <option key={governrate.id} value={governrate.id}>{governrate.name}</option>
                                            ))
                                       }
                                    </select>
                                </div>
                                <div className="form-group">
                                    <label className="text-primary" htmlFor="phone">Phone</label>
                                    <input required 
                                    id="phone" 
                                    className="form-control" 
                                    type="tel" 
                                    name="phone"
                                    placeholder="phone" 
                                    onChange={this.changeHandler}
                                    />
                                </div>
                                <div className="form-group">
                                    <div className="form-check">
                                        <label htmlFor="agree" className="form-check-label">
                                            <input required id="agree" className="form-check-input" type="checkbox" />I agree to the license terms.
                                        </label>
                                    </div>
                                </div>
                                {(this.props.waitingTime?
                                <button class="btn btn-primary btn-block" type="button" disabled>
                                    Loading...
                                    <span class="spinner-border spinner-border-sm mx-3" role="status" aria-hidden="true"></span>
                                </button>:
                                <div className="form-group">
                                    <button className="btn btn-primary btn-block" type="submit">Create account</button>
                                </div>
                                )}
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